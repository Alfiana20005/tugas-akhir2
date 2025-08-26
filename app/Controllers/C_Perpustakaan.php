<?php

namespace App\Controllers;

use App\Models\M_Perpustakaan;
use CodeIgniter\API\ResponseTrait;

class C_Perpustakaan extends BaseController
{
    protected $M_Perpustakaan;
    use ResponseTrait;

    public function __construct()
    {
        $this->M_Perpustakaan = new M_Perpustakaan();
    }

    public function index(): string
    {
        // Get all filter parameters from GET request
        $keyword = $this->request->getGet('keyword');
        $pengarang = $this->request->getGet('pengarang');
        $penerbit = $this->request->getGet('penerbit');
        $tempatTerbit = $this->request->getGet('tempatTerbit');
        $tahunTerbit = $this->request->getGet('tahunTerbit');
        $jenisBuku = $this->request->getGet('jenisBuku');
        $kategoriBuku = $this->request->getGet('kategoriBuku');
        $status = $this->request->getGet('status');
        $keadaan = $this->request->getGet('keadaan');
        $bahasa = $this->request->getGet('bahasa');
        $rak = $this->request->getGet('rak');
        $tampilkan = $this->request->getGet('tampilkan');
        $filter = $this->request->getGet('filter'); // untuk filter no_image

        // Get current page
        $currentPage = $this->request->getGet('page') ?? 1;

        // Get filtered and paginated data with grouping by title
        $data_buku = $this->M_Perpustakaan->getAllWithFiltersGrouped(
            $keyword,
            $pengarang,
            $penerbit,
            $tempatTerbit,
            $tahunTerbit,
            $jenisBuku,
            $kategoriBuku,
            $status,
            $keadaan,
            $bahasa,
            $rak,
            $tampilkan,
            $filter,
            15, // items per page
            $currentPage
        );

        // Get pager from model
        $pager = $this->M_Perpustakaan->pager;

        // Get unique values for dropdowns
        $pengarang_list = $this->M_Perpustakaan->getUniqueValues('pengarang');
        $penerbit_list = $this->M_Perpustakaan->getUniqueValues('penerbit');
        $tempatTerbit_list = $this->M_Perpustakaan->getUniqueValues('tempatTerbit');
        $tahunTerbit_list = $this->M_Perpustakaan->getUniqueValues('tahunTerbit');
        $jenisBuku_list = $this->M_Perpustakaan->getUniqueValues('jenisBuku');
        $kategoriBuku_list = $this->M_Perpustakaan->getUniqueValues('kategoriBuku');
        $status_list = $this->M_Perpustakaan->getUniqueValues('status');
        $keadaan_list = $this->M_Perpustakaan->getUniqueValues('keadaan');
        $bahasa_list = $this->M_Perpustakaan->getUniqueValues('bahasa');
        $rak_list = $this->M_Perpustakaan->getUniqueValues('rak');
        $jenisPengarang_list = $this->M_Perpustakaan->getUniqueValues('jenisPengarang');

        // Get totals for dashboard cards
        $totalBuku = $this->M_Perpustakaan->countBuku();
        $totalEksemplar = $this->M_Perpustakaan->sumEksemplar();
        $kategoriCounts = $this->M_Perpustakaan->countByCategory();

        // Prepare data to send to view
        $data = [
            'title' => 'Daftar Buku',
            'data_buku' => $data_buku,
            'pager' => $pager,
            'pengarang_list' => $pengarang_list,
            'penerbit_list' => $penerbit_list,
            'tempatTerbit_list' => $tempatTerbit_list,
            'tahunTerbit_list' => $tahunTerbit_list,
            'jenisBuku_list' => $jenisBuku_list,
            'kategoriBuku_list' => $kategoriBuku_list,
            'status_list' => $status_list,
            'keadaan_list' => $keadaan_list,
            'bahasa_list' => $bahasa_list,
            'rak_list' => $rak_list,
            'jenisPengarang_list' => $jenisPengarang_list,
            'filter' => $filter,
            'filters' => [
                'keyword' => $keyword,
                'pengarang' => $pengarang,
                'penerbit' => $penerbit,
                'tempatTerbit' => $tempatTerbit,
                'tahunTerbit' => $tahunTerbit,
                'jenisBuku' => $jenisBuku,
                'kategoriBuku' => $kategoriBuku,
                'status' => $status,
                'keadaan' => $keadaan,
                'bahasa' => $bahasa,
                'rak' => $rak,
                'tampilkan' => $tampilkan
            ],
            'totalBuku' => $totalBuku,
            'totalEksemplar' => $totalEksemplar,
            'kategoriCounts' => $kategoriCounts,
        ];

        return view('dataBuku', $data);
    }

    public function getAllDataBuku()
    {
        // Ambil SEMUA data tanpa limit
        $data = $this->M_Perpustakaan->getAllBooks(); // tanpa pagination

        return $this->response->setJSON([
            'success' => true,
            'data' => $data
        ]);
    }

    public function cekJudulBuku()
    {
        $judul = $this->request->getGet('judul');
        $existingBook = $this->M_Perpustakaan->where('judul', $judul)->first();

        $response = [
            'exists' => ($existingBook !== null)
        ];

        // Tambahkan informasi rak jika buku ditemukan
        if ($existingBook !== null) {
            $response['rak'] = $existingBook['rak'];
        }

        $this->response->setHeader('Content-Type', 'application/json');
        return $this->response->setJSON($response);
    }

    public function saveDataBuku()
    {
        // Validation
        $rules = [
            'judul' => [
                'rules' => 'required',
                'errors' => ['required' => 'Judul harus diisi']
            ]
        ];

        if (!$this->validate($rules)) {
            if ($this->request->isAJAX()) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Validasi gagal: ' . $this->validator->listErrors()
                ]);
            }
            return redirect()->to(base_url('/dataBuku'))
                ->withInput()
                ->with('errors', $this->validator->listErrors());
        }

        $idPetugas = session()->get('id_petugas');
        if (empty($idPetugas)) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Error: id_petugas tidak valid'
            ]);
        }

        try {
            // Handle file upload
            $foto = $this->request->getFile('foto');
            $defaultImg = 'no_cover.jpeg';

            if ($foto && $foto->isValid() && !$foto->hasMoved()) {
                $fotoName = $foto->getRandomName();
                $foto->move('img/perpustakaan', $fotoName);
            } else {
                $fotoName = $defaultImg;
            }

            // Process pengarang data (handle array of authors)
            $pengarangData = $this->request->getVar('pengarang');
            $pengarangString = '';
            $jenisPengarangString = '';

            if (is_array($pengarangData)) {
                $pengarangList = [];
                $jenisPengarangList = [];

                foreach ($pengarangData as $index => $author) {
                    if (!empty($author['nama'])) {
                        $pengarangList[] = trim($author['nama']);
                        $jenisPengarangList[] = trim($author['jenisPengarang'] ?? '');
                    }
                }

                $pengarangString = implode('; ', $pengarangList);
                $jenisPengarangString = implode('; ', $jenisPengarangList);
            } else {
                // Fallback for single author (backward compatibility)
                $pengarangString = $this->request->getVar('pengarang') ?? '';
                $jenisPengarangString = $this->request->getVar('jenisPengarang') ?? '';
            }

            // Handle multiple eksemplar creation
            $jumlahEksemplar = (int)$this->request->getVar('eksemplar') ?: 1;
            $kodeEksemplarArray = json_decode($this->request->getVar('kode_eksemplar_array'), true);

            // Get the base kode (different from kodeEksemplar)
            $baseKode = $this->request->getVar('kode') ?? '';

            // If kode eksemplar array is not provided, create simple codes
            if (!$kodeEksemplarArray) {
                $kodeEksemplarArray = [];
                for ($i = 1; $i <= $jumlahEksemplar; $i++) {
                    $kodeEksemplarArray[] = $baseKode . '-' . str_pad($i, 3, '0', STR_PAD_LEFT);
                }
            }

            $db = \Config\Database::connect();
            $db->transStart();

            $successCount = 0;
            $errors = [];

            // Create base book data
            $baseData = [
                'judul' => $this->request->getVar('judul'),
                'pengarang' => $pengarangString,
                'jenisPengarang' => $jenisPengarangString,
                'penerbit' => $this->request->getVar('penerbit'),
                'tempatTerbit' => $this->request->getVar('tempatTerbit'),
                'tahunTerbit' => $this->request->getVar('tahunTerbit'),
                'jenisBuku' => $this->request->getVar('jenisBuku'),
                'bahasa' => $this->request->getVar('bahasa'),
                'rak' => $this->request->getVar('rak'),
                'isbn' => $this->request->getVar('isbn'),
                'nomorSeri' => $this->request->getVar('nomorSeri'),
                'keadaan' => $this->request->getVar('keadaan'),
                'status' => $this->request->getVar('status'),
                'subjek' => $this->request->getVar('subjek'),
                'keterangan' => $this->request->getVar('keterangan'),
                'kategoriBuku' => $this->request->getVar('kategoriBuku'),
                'tampilkan' => $this->request->getVar('tampilkan'),
                'foto' => $fotoName,
                'id_petugas' => $idPetugas,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'kode' => $baseKode // Base kode for the book
            ];

            // Create each eksemplar as separate record
            foreach ($kodeEksemplarArray as $index => $kodeEksemplar) {
                $data = $baseData;
                $data['kodeEksemplar'] = $kodeEksemplar; // Unique code for each copy
                $data['eksemplar'] = 1; // Each record represents 1 copy

                try {
                    if ($this->M_Perpustakaan->save($data)) {
                        $successCount++;
                    } else {
                        $errors[] = "Gagal menyimpan eksemplar: {$kodeEksemplar}";
                    }
                } catch (\Exception $e) {
                    $errors[] = "Error pada eksemplar {$kodeEksemplar}: " . $e->getMessage();
                    log_message('error', "Error saving eksemplar {$kodeEksemplar}: " . $e->getMessage());
                }
            }

            $db->transComplete();

            // Check transaction status
            if ($db->transStatus() === false) {
                log_message('error', 'Database transaction failed');
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Gagal menyimpan data ke database (transaction failed)'
                ]);
            }

            // Set flash message for non-AJAX requests
            if (!$this->request->isAJAX()) {
                session()->setFlashdata('pesan', "Data Berhasil Ditambahkan. {$successCount} eksemplar berhasil disimpan.");
            }

            // Always return JSON response
            return $this->response->setJSON([
                'success' => true,
                'message' => "{$successCount} eksemplar berhasil disimpan",
                'count' => $successCount,
                'errors' => $errors
            ]);
        } catch (\Exception $e) {
            log_message('error', 'Error saving book data: ' . $e->getMessage());
            log_message('error', 'Stack trace: ' . $e->getTraceAsString());

            return $this->response->setJSON([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ]);
        }
    }

    public function deleteBuku($id_buku)
    {
        // Saring masukan untuk mencegah SQL injection atau serangan lainnya
        $id_buku = filter_var($id_buku, FILTER_SANITIZE_NUMBER_INT);

        // Panggil metode delete pada model atau apapun yang diperlukan
        $this->M_Perpustakaan->delete($id_buku);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus.');

        // Redirect ke halaman yang sesuai
        return redirect()->to('/dataBuku');
    }

    public function updateBuku($id_buku)
    {
        try {
            // Get existing data first
            $existingBuku = $this->M_Perpustakaan->getBuku($id_buku);
            if (!$existingBuku) {
                throw new \Exception('Buku tidak ditemukan');
            }

            // Process pengarang data (handle array of authors)
            $pengarangData = $this->request->getVar('pengarang');
            $pengarangString = '';
            $jenisPengarangString = '';

            if (is_array($pengarangData)) {
                $pengarangList = [];
                $jenisPengarangList = [];

                foreach ($pengarangData as $index => $author) {
                    if (!empty($author['nama'])) {
                        $pengarangList[] = trim($author['nama']);
                        $jenisPengarangList[] = trim($author['jenisPengarang'] ?? '');
                    }
                }

                $pengarangString = implode('; ', $pengarangList);
                $jenisPengarangString = implode('; ', $jenisPengarangList);
            } else {
                $pengarangString = $this->request->getVar('pengarang') ?? '';
                $jenisPengarangString = $this->request->getVar('jenisPengarang') ?? '';
            }

            // Get ALL existing copies of this book by judul (since that's what groups them)
            $allCopies = $this->M_Perpustakaan->getExistingCopiesByBook(
                $existingBuku['judul'],
                $existingBuku['pengarang'],
                $existingBuku['penerbit']
            );

            $currentTotalEksemplar = count($allCopies); // This is the real current count
            $newTotalEksemplar = (int)$this->request->getVar('eksemplar'); // Target count

            // Base data for all updates
            $baseDataToUpdate = [
                'kode' => $this->request->getVar('kode'),
                'judul' => $this->request->getVar('judul'),
                'pengarang' => $pengarangString,
                'jenisPengarang' => $jenisPengarangString,
                'penerbit' => $this->request->getVar('penerbit'),
                'tempatTerbit' => $this->request->getVar('tempatTerbit'),
                'tahunTerbit' => $this->request->getVar('tahunTerbit'),
                'jenisBuku' => $this->request->getVar('jenisBuku'),
                'bahasa' => $this->request->getVar('bahasa'),
                'rak' => $this->request->getVar('rak'),
                'isbn' => $this->request->getVar('isbn'),
                'nomorSeri' => $this->request->getVar('nomorSeri'),
                'keadaan' => $this->request->getVar('keadaan'),
                'status' => $this->request->getVar('status'),
                'subjek' => $this->request->getVar('subjek'),
                'keterangan' => $this->request->getVar('keterangan'),
                'kategoriBuku' => $this->request->getVar('kategoriBuku'),
                'tampilkan' => $this->request->getVar('tampilkan'),
                'updated_at' => date('Y-m-d H:i:s')
            ];

            // Handle photo upload
            $foto = $this->request->getFile('foto');
            $fotoName = $existingBuku['foto']; // Keep existing photo by default

            if ($foto && $foto->isValid() && !$foto->hasMoved()) {
                // Validate file size (max 2MB)
                if ($foto->getSize() > 2097152) {
                    throw new \Exception('Ukuran file foto tidak boleh lebih dari 2MB');
                }

                // Validate file type
                $allowedTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif'];
                if (!in_array($foto->getMimeType(), $allowedTypes)) {
                    throw new \Exception('Format file tidak didukung. Gunakan JPEG, JPG, PNG, atau GIF');
                }

                $fotoName = $foto->getRandomName();
                $foto->move('img/perpustakaan', $fotoName);

                // Delete old photo if it's not default
                if (
                    !empty($existingBuku['foto']) &&
                    $existingBuku['foto'] !== 'no_cover.jpeg' &&
                    file_exists('img/perpustakaan/' . $existingBuku['foto'])
                ) {
                    unlink('img/perpustakaan/' . $existingBuku['foto']);
                }
            }

            $baseDataToUpdate['foto'] = $fotoName;

            $db = \Config\Database::connect();
            $db->transStart();

            if ($newTotalEksemplar > $currentTotalEksemplar) {
                // CASE 1: Adding more eksemplar - create new records
                $copiesToAdd = $newTotalEksemplar - $currentTotalEksemplar;

                // First, update all existing copies with new data
                foreach ($allCopies as $copy) {
                    $updateData = $baseDataToUpdate;
                    $updateData['kodeEksemplar'] = $copy['kodeEksemplar']; // Keep original kode
                    $updateData['eksemplar'] = 1; // Each record represents 1 copy
                    $this->M_Perpustakaan->update($copy['id_buku'], $updateData);
                }

                // Generate kode eksemplar for new copies
                $existingKodes = array_column($allCopies, 'kodeEksemplar');

                // Get prefix and suffix from form input or detect from existing codes
                $prefix = $this->request->getVar('kode_prefix') ?? '';
                $suffix = $this->request->getVar('kode_suffix') ?? '';
                $nomorMulai = (int)$this->request->getVar('nomor_mulai') ?? 1;

                // If no prefix/suffix provided, try to detect from existing codes
                if (empty($prefix) && empty($suffix) && !empty($existingKodes)) {
                    $pattern = $this->detectKodePattern($existingKodes);
                    if ($pattern) {
                        $prefix = $pattern['prefix'];
                        $suffix = $pattern['suffix'];
                    }
                }

                // Generate new kode eksemplar
                $newKodeEksemplar = [];
                $maxNumber = $this->getMaxNumberFromKodes($existingKodes);

                for ($i = 1; $i <= $copiesToAdd; $i++) {
                    $newNumber = $maxNumber + $i;
                    $formattedNumber = str_pad($newNumber, 5, '0', STR_PAD_LEFT);
                    $newKodeEksemplar[] = $prefix . $formattedNumber . $suffix;
                }

                // Create new records
                $createdCount = 0;
                foreach ($newKodeEksemplar as $kode) {
                    $newData = $baseDataToUpdate;
                    $newData['kodeEksemplar'] = $kode;
                    $newData['eksemplar'] = 1;
                    $newData['created_at'] = date('Y-m-d H:i:s');
                    $newData['id_petugas'] = session()->get('id_petugas');

                    if ($this->M_Perpustakaan->save($newData)) {
                        $createdCount++;
                    }
                }

                $message = "Data berhasil diupdate. Ditambahkan {$createdCount} eksemplar baru (dari {$currentTotalEksemplar} menjadi " . ($currentTotalEksemplar + $createdCount) . " eksemplar).";
            } elseif ($newTotalEksemplar < $currentTotalEksemplar) {
                // CASE 2: Reducing eksemplar - delete excess records
                $copiesToDelete = $currentTotalEksemplar - $newTotalEksemplar;

                // Sort by ID to keep the original ones and delete the newest
                usort($allCopies, function ($a, $b) {
                    return $a['id_buku'] - $b['id_buku'];
                });

                $deletedCount = 0;
                $updatedCount = 0;

                // Delete excess records (starting from the newest)
                for ($i = count($allCopies) - 1; $i >= 0 && $deletedCount < $copiesToDelete; $i--) {
                    // Delete photo if it's not default and not used by other records
                    if (
                        !empty($allCopies[$i]['foto']) &&
                        $allCopies[$i]['foto'] !== 'no_cover.jpeg' &&
                        $allCopies[$i]['foto'] !== $fotoName
                    ) {
                        $imagePath = FCPATH . 'img/perpustakaan/' . $allCopies[$i]['foto'];
                        if (file_exists($imagePath)) {
                            unlink($imagePath);
                        }
                    }

                    if ($this->M_Perpustakaan->delete($allCopies[$i]['id_buku'])) {
                        $deletedCount++;
                    }
                }

                // Update remaining records with new data
                for ($i = 0; $i < count($allCopies) - $deletedCount; $i++) {
                    $updateData = $baseDataToUpdate;
                    $updateData['kodeEksemplar'] = $allCopies[$i]['kodeEksemplar'];
                    $updateData['eksemplar'] = 1;
                    $this->M_Perpustakaan->update($allCopies[$i]['id_buku'], $updateData);
                    $updatedCount++;
                }

                $message = "Data berhasil diupdate. Dihapus {$deletedCount} eksemplar (dari {$currentTotalEksemplar} menjadi {$newTotalEksemplar} eksemplar).";
            } else {
                // CASE 3: Same eksemplar count - just update all existing records
                $updatedCount = 0;
                foreach ($allCopies as $copy) {
                    $updateData = $baseDataToUpdate;
                    $updateData['kodeEksemplar'] = $copy['kodeEksemplar'];
                    $updateData['eksemplar'] = 1;
                    $this->M_Perpustakaan->update($copy['id_buku'], $updateData);
                    $updatedCount++;
                }

                $message = "Data buku berhasil diupdate ({$updatedCount} eksemplar).";
            }

            $db->transComplete();

            if ($db->transStatus() === false) {
                throw new \Exception('Gagal menyimpan perubahan ke database');
            }

            session()->setFlashdata('pesan', $message);

            if ($this->request->isAJAX()) {
                return $this->response->setJSON([
                    'success' => true,
                    'message' => $message
                ]);
            }

            return redirect()->to('/dataBuku');
        } catch (\Exception $e) {
            log_message('error', 'Error updating book with eksemplar logic: ' . $e->getMessage());

            $errorMessage = 'Terjadi kesalahan: ' . $e->getMessage();

            if ($this->request->isAJAX()) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => $errorMessage
                ]);
            }

            session()->setFlashdata('error', $errorMessage);
            return redirect()->to('/dataBuku');
        }
    }

    /**
     * Get maximum number from existing kode eksemplar
     */
    private function getMaxNumberFromKodes($existingKodes)
    {
        $maxNumber = 0;

        foreach ($existingKodes as $kode) {
            // Extract all numbers from the code and take the last/largest one
            preg_match_all('/\d+/', $kode, $matches);
            if (!empty($matches[0])) {
                $numbers = array_map('intval', $matches[0]);
                $maxNumber = max($maxNumber, max($numbers));
            }
        }

        return $maxNumber;
    }

    /**
     * Generate next kode eksemplar based on existing patterns
     */
    private function generateNextKodeEksemplar($existingKodes, $countNeeded)
    {
        if (empty($existingKodes)) {
            // If no existing codes, start with simple pattern
            $nextKodes = [];
            for ($i = 1; $i <= $countNeeded; $i++) {
                $nextKodes[] = 'BK-' . str_pad($i, 5, '0', STR_PAD_LEFT);
            }
            return $nextKodes;
        }

        // Try to detect pattern from existing codes
        $pattern = $this->detectKodePattern($existingKodes);

        if ($pattern) {
            return $this->generateKodesFromPattern($pattern, $countNeeded);
        }

        // Fallback: simple incremental pattern
        $maxNumber = 0;
        foreach ($existingKodes as $kode) {
            // Extract numbers from the code
            preg_match_all('/\d+/', $kode, $matches);
            if (!empty($matches[0])) {
                $number = (int)end($matches[0]);
                $maxNumber = max($maxNumber, $number);
            }
        }

        $nextKodes = [];
        for ($i = 1; $i <= $countNeeded; $i++) {
            $newNumber = $maxNumber + $i;
            $nextKodes[] = 'BK-' . str_pad($newNumber, 5, '0', STR_PAD_LEFT);
        }

        return $nextKodes;
    }

    /**
     * Detect pattern from existing kode eksemplar
     */
    private function detectKodePattern($existingKodes)
    {
        if (empty($existingKodes)) {
            return null;
        }

        // Take the first code as pattern reference
        $firstKode = $existingKodes[0];

        // Try to extract prefix, number, and suffix
        if (preg_match('/^(.*?)(\d+)(.*)$/', $firstKode, $matches)) {
            return [
                'prefix' => $matches[1],
                'suffix' => $matches[3],
                'number_length' => strlen($matches[2]),
                'existing_numbers' => $this->extractNumbersFromKodes($existingKodes)
            ];
        }

        return null;
    }

    /**
     * Extract all numbers from existing kodes
     */
    private function extractNumbersFromKodes($kodes)
    {
        $numbers = [];
        foreach ($kodes as $kode) {
            if (preg_match('/(\d+)/', $kode, $matches)) {
                $numbers[] = (int)$matches[1];
            }
        }
        return $numbers;
    }

    /**
     * Generate new kodes from detected pattern
     */
    private function generateKodesFromPattern($pattern, $countNeeded)
    {
        $existingNumbers = $pattern['existing_numbers'];
        $maxNumber = empty($existingNumbers) ? 0 : max($existingNumbers);

        $newKodes = [];
        for ($i = 1; $i <= $countNeeded; $i++) {
            $newNumber = $maxNumber + $i;
            $paddedNumber = str_pad($newNumber, $pattern['number_length'], '0', STR_PAD_LEFT);
            $newKodes[] = $pattern['prefix'] . $paddedNumber . $pattern['suffix'];
        }

        return $newKodes;
    }

    public function tambahData()
    {
        return view('perpustakaan2/inputData');
    }

    public function delete($id)
    {
        // Saring masukan untuk mencegah SQL injection atau serangan lainnya
        $id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);

        // Panggil metode delete pada model atau apapun yang diperlukan
        $this->M_Perpustakaan->delete($id);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus.');

        // Redirect ke halaman yang sesuai
        return redirect()->back();
    }

    /**
     * Method untuk menghapus multiple buku sekaligus
     */
    public function deleteMultipleBuku()
    {
        // Check if user has permission
        if (session()->get('level') !== 'Perpustakaan') {
            return redirect()->back()->with('error', 'Anda tidak memiliki akses untuk menghapus data buku.');
        }

        $bookIds = $this->request->getPost('book_ids');

        if (empty($bookIds)) {
            return redirect()->back()->with('error', 'Tidak ada buku yang dipilih untuk dihapus.');
        }

        // Convert comma-separated IDs to array
        $idsArray = explode(',', $bookIds);
        $idsArray = array_map('trim', $idsArray);

        $db = \Config\Database::connect();
        $db->transStart();

        try {
            $deletedCount = 0;

            foreach ($idsArray as $id) {
                if (is_numeric($id)) {
                    // Get book data first to delete image file
                    $buku = $this->M_Perpustakaan->find($id);

                    if ($buku) {
                        // Delete image file if exists and not default
                        if (!empty($buku['foto']) && !in_array($buku['foto'], ['no_cover.jpeg', 'default.jpg'])) {
                            $imagePath = FCPATH . 'img/perpustakaan/' . $buku['foto'];
                            if (file_exists($imagePath)) {
                                unlink($imagePath);
                            }
                        }

                        // Delete from database
                        if ($this->M_Perpustakaan->delete($id)) {
                            $deletedCount++;
                        }
                    }
                }
            }

            $db->transComplete();

            if ($db->transStatus() === false) {
                return redirect()->back()->with('error', 'Gagal menghapus data buku.');
            }

            $message = "Berhasil menghapus {$deletedCount} eksemplar buku.";
            return redirect()->back()->with('success', $message);
        } catch (\Exception $e) {
            $db->transRollback();
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }


    public function tampilBuku($kategoriBuku)
    {
        // Mendapatkan data koleksi berdasarkan kategori
        $data_buku = $this->M_Perpustakaan->getKoleksiByKategori($kategoriBuku);

        // Mendapatkan nama kategori
        $kategoriName = $this->M_Perpustakaan->getKategoriName($kategoriBuku);

        // Mengecek apakah kategori ditemukan
        if ($kategoriName !== null && isset($kategoriName['nama_kategori'])) {
            // Jika kategori ditemukan, gunakan nama kategori di judul
            $judulKategori = $kategoriName['nama_kategori'];
        } else {
            // Handle jika kategori tidak ditemukan
            $judulKategori = 'Kategori Tidak Ditemukan';
        }

        // Membuat array data untuk dikirim ke view
        $data = [
            'title' => 'Daftar Koleksi ', // Menggunakan nama kategori di judul
            'data_koleksi' => $data_buku,
            'kategori' => $kategoriName,
            'judul' => $judulKategori,
        ];

        // Menampilkan view dengan data yang telah disiapkan
        return view('dataBuku', $data);
    }

    // Add this method to your C_Perpustakaan controller

    /**
     * Preview kode eksemplar for new copies
     */
    public function previewKodeEksemplar()
    {
        if (!$this->request->isAJAX()) {
            return $this->response->setStatusCode(400)->setJSON([
                'success' => false,
                'message' => 'Invalid request'
            ]);
        }

        try {
            $input = json_decode($this->request->getBody(), true);
            $judul = $input['judul'] ?? '';
            $pengarang = $input['pengarang'] ?? '';
            $penerbit = $input['penerbit'] ?? '';
            $count = (int)($input['count'] ?? 1);

            if (empty($judul) || $count < 1) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Invalid parameters'
                ]);
            }

            // Get existing kode eksemplar for this book
            $existingKodes = $this->M_Perpustakaan->getExistingKodeEksemplar($judul, $pengarang, $penerbit);

            // Generate next kode eksemplar
            $nextKodes = $this->generateNextKodeEksemplar($existingKodes, $count);

            return $this->response->setJSON([
                'success' => true,
                'codes' => $nextKodes,
                'existing_count' => count($existingKodes)
            ]);
        } catch (\Exception $e) {
            log_message('error', 'Error previewing kode eksemplar: ' . $e->getMessage());

            return $this->response->setJSON([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ]);
        }
    }
}
