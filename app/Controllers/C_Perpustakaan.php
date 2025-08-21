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

        // Get filtered and paginated data
        $data_buku = $this->M_Perpustakaan->getAllWithFilters(
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
            'filter' => $filter, // Add current filter
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
            // Process pengarang data (handle array of authors) - same logic as saveDataBuku
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

            // Get existing data to preserve kodeEksemplar if not provided in form
            $existingBuku = $this->M_Perpustakaan->getBuku($id_buku);
            $kodeEksemplar = $this->request->getVar('kodeEksemplar');

            // If kodeEksemplar is empty in form but exists in database, preserve it
            if (empty($kodeEksemplar) && !empty($existingBuku['kodeEksemplar'])) {
                $kodeEksemplar = $existingBuku['kodeEksemplar'];
            }

            // Mengambil data yang akan diupdate dari request
            $dataToUpdate = [
                'kode' => $this->request->getVar('kode'),
                'judul' => $this->request->getVar('judul'),
                'pengarang' => $pengarangString, // Use processed string
                'jenisPengarang' => $jenisPengarangString, // Use processed string
                'penerbit' => $this->request->getVar('penerbit'),
                'tempatTerbit' => $this->request->getVar('tempatTerbit'),
                'tahunTerbit' => $this->request->getVar('tahunTerbit'),
                'jenisBuku' => $this->request->getVar('jenisBuku'),
                'bahasa' => $this->request->getVar('bahasa'),
                'rak' => $this->request->getVar('rak'),
                'eksemplar' => $this->request->getVar('eksemplar'),
                'kodeEksemplar' => $kodeEksemplar, // Use preserved or updated kodeEksemplar
                'isbn' => $this->request->getVar('isbn'),
                'nomorSeri' => $this->request->getVar('nomorSeri'),
                'keadaan' => $this->request->getVar('keadaan'),
                'status' => $this->request->getVar('status'),
                'subjek' => $this->request->getVar('subjek'),
                'keterangan' => $this->request->getVar('keterangan'),
                'kategoriBuku' => $this->request->getVar('kategoriBuku'),
                'tampilkan' => $this->request->getVar('tampilkan'),
                'updated_at' => date('Y-m-d H:i:s') // Add updated timestamp
            ];

            $foto = $this->request->getFile('foto');

            // Cek apakah file foto diunggah
            if ($foto && $foto->isValid() && !$foto->hasMoved()) {
                // Validate file size (max 2MB)
                if ($foto->getSize() > 2097152) { // 2MB in bytes
                    throw new \Exception('Ukuran file foto tidak boleh lebih dari 2MB');
                }

                // Validate file type
                $allowedTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif'];
                if (!in_array($foto->getMimeType(), $allowedTypes)) {
                    throw new \Exception('Format file tidak didukung. Gunakan JPEG, JPG, PNG, atau GIF');
                }

                // Generate nama unik untuk file foto
                $fotoName = $foto->getRandomName();

                // Pindahkan file foto ke folder yang diinginkan
                $foto->move('img/perpustakaan', $fotoName);

                // Tambahkan nama file foto ke data yang akan diupdate
                $dataToUpdate['foto'] = $fotoName;

                // Hapus foto lama jika ada dan bukan foto default
                if (
                    $existingBuku && !empty($existingBuku['foto']) &&
                    $existingBuku['foto'] !== 'no_cover.jpeg' &&
                    file_exists('img/perpustakaan/' . $existingBuku['foto'])
                ) {
                    unlink('img/perpustakaan/' . $existingBuku['foto']);
                }
            }

            // Log data yang akan diupdate untuk debugging
            log_message('info', 'Update data for book ID ' . $id_buku . ': ' . json_encode($dataToUpdate));

            // Memastikan ada data yang akan diupdate
            $updateResult = $this->M_Perpustakaan->update($id_buku, $dataToUpdate);

            if ($updateResult) {
                // Set flash message
                session()->setFlashdata('pesan', 'Data Buku Berhasil diubah.');

                // Check if it's an AJAX request
                if ($this->request->isAJAX()) {
                    return $this->response->setJSON([
                        'success' => true,
                        'message' => 'Data Buku Berhasil diubah.',
                        'data' => $dataToUpdate // Return updated data for debugging
                    ]);
                }
            } else {
                if ($this->request->isAJAX()) {
                    return $this->response->setJSON([
                        'success' => false,
                        'message' => 'Gagal mengupdate data buku.'
                    ]);
                }
                session()->setFlashdata('error', 'Gagal mengupdate data buku.');
            }

            // Redirect ke halaman sebelumnya atau halaman yang sesuai
            return redirect()->to('/dataBuku');
        } catch (\Exception $e) {
            log_message('error', 'Error updating book data: ' . $e->getMessage());
            log_message('error', 'Stack trace: ' . $e->getTraceAsString());
            log_message('error', 'Request data: ' . json_encode($this->request->getVar()));

            if ($this->request->isAJAX()) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Terjadi kesalahan: ' . $e->getMessage()
                ]);
            }

            session()->setFlashdata('error', 'Terjadi kesalahan saat mengupdate data: ' . $e->getMessage());
            return redirect()->to('/dataBuku');
        }
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
}
