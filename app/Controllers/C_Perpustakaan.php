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
        $penerbit = $this->request->getGet('penerbit');   // Added this line
        $tempatTerbit = $this->request->getGet('tempatTerbit');
        $tahunTerbit = $this->request->getGet('tahunTerbit');   // Added this line
        $kategoriBuku = $this->request->getGet('kategoriBuku');
        $status = $this->request->getGet('status');

        // Get filtered and paginated data
        $data_buku = $this->M_Perpustakaan->getAllWithFilters(
            $keyword,
            $pengarang,
            $penerbit,        // Added this parameter
            $tempatTerbit,
            $tahunTerbit,     // Added this parameter
            $kategoriBuku,
            $status
        );

        $pager = $this->M_Perpustakaan->pager;

        // Get unique values for dropdowns
        $pengarang_list = $this->M_Perpustakaan->getUniqueValues('pengarang');
        $penerbit_list = $this->M_Perpustakaan->getUniqueValues('penerbit');     // Added this line
        $tempatTerbit_list = $this->M_Perpustakaan->getUniqueValues('tempatTerbit');
        $tahunTerbit_list = $this->M_Perpustakaan->getUniqueValues('tahunTerbit'); // Added this line
        $kategoriBuku_list = $this->M_Perpustakaan->getUniqueValues('kategoriBuku');
        $status_list = $this->M_Perpustakaan->getUniqueValues('status');

        // Prepare data to send to view
        $data = [
            'title' => 'Daftar Buku',
            'data_buku' => $data_buku,
            'pager' => $pager,
            'pengarang_list' => $pengarang_list,
            'penerbit_list' => $penerbit_list,           // Added this line
            'tempatTerbit_list' => $tempatTerbit_list,
            'tahunTerbit_list' => $tahunTerbit_list,     // Added this line
            'kategoriBuku_list' => $kategoriBuku_list,
            'status_list' => $status_list,
            'filters' => [
                'keyword' => $keyword,
                'pengarang' => $pengarang,
                'penerbit' => $penerbit,                // Added this line
                'tempatTerbit' => $tempatTerbit,
                'tahunTerbit' => $tahunTerbit,          // Added this line
                'kategoriBuku' => $kategoriBuku,
                'status' => $status
            ]
        ];

        return view('dataBuku', $data);
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
        //validation
        $rules = [
            'judul' => [
                'rules' => 'required',
                'errors' => ['required' => 'Judul harus diisi']
            ],
        ];

        if (!$this->validate($rules)) {
            // session()->setFlashdata('errors', $this->validator->listErrors());
            return redirect()->to('/dataBuku')->withInput()->with('errors', $this->validator->listErrors());
        }

        $foto = $this->request->getFile('foto');
        $dafaultImg = 'no_cover.jpg';

        if ($foto->isValid() && !$foto->hasMoved()) {
            $fotoName = $foto->getRandomName();
            $foto->move('img/perpustakaan', $fotoName);
        } else {
            // Handle file upload error
            $fotoName = $dafaultImg;
        }


        $this->M_Perpustakaan->save([
            // 'id_petugas' => $id_petugas,
            'kode' => $this->request->getVar('kode'),
            'judul' => $this->request->getVar('judul'),
            'pengarang' => $this->request->getVar('pengarang'),
            'penerbit' => $this->request->getVar('penerbit'),
            'tempatTerbit' => $this->request->getVar('tempatTerbit'),
            'tahunTerbit' => $this->request->getVar('tahunTerbit'),
            'rak' => $this->request->getVar('rak'),
            'eksemplar' => $this->request->getVar('eksemplar'),
            'nomorSeri' => $this->request->getVar('nomorSeri'),
            'status' => $this->request->getVar('status'),
            'keterangan' => $this->request->getVar('keterangan'),
            'kategoriBuku' => $this->request->getVar('kategoriBuku'),
            'tampilkan' => $this->request->getVar('tampilkan'),
            'foto' => $fotoName,

        ]);

        //alert
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan.');

        return redirect()->to('/dataBuku');

        // return view('admin/v_masterpetugas');
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
        // Mengambil data yang akan diupdate dari request
        $dataToUpdate = [
            'kode' => $this->request->getVar('kode'),
            'judul' => $this->request->getVar('judul'),
            'pengarang' => $this->request->getVar('pengarang'),
            'penerbit' => $this->request->getVar('penerbit'),
            'tempatTerbit' => $this->request->getVar('tempatTerbit'),
            'tahunTerbit' => $this->request->getVar('tahunTerbit'),
            'rak' => $this->request->getVar('rak'),
            'eksemplar' => $this->request->getVar('eksemplar'),
            'nomorSeri' => $this->request->getVar('nomorSeri'),
            'status' => $this->request->getVar('status'),
            'keterangan' => $this->request->getVar('keterangan'),
            'kategoriBuku' => $this->request->getVar('kategoriBuku'),
            'tampilkan' => $this->request->getVar('tampilkan')
        ];

        $foto = $this->request->getFile('foto');

        // Cek apakah file foto diunggah
        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            // Generate nama unik untuk file foto
            $fotoName = $foto->getRandomName();

            // Pindahkan file foto ke folder yang diinginkan
            $foto->move('img/perpustakaan', $fotoName);

            // Tambahkan nama file foto ke data yang akan diupdate
            $dataToUpdate['foto'] = $fotoName;

            // Hapus foto lama jika ada
            $oldBuku = $this->M_Perpustakaan->getBuku($id_buku);
            if ($oldBuku && !empty($oldBuku['foto']) && file_exists('img/perpustakaan/' . $oldBuku['foto'])) {
                unlink('img/perpustakaan/' . $oldBuku['foto']);
            }
        }

        // Memastikan ada data yang akan diupdate
        $this->M_Perpustakaan->update($id_buku, $dataToUpdate);

        // Set flash message
        session()->setFlashdata('pesan', 'Data Buku Berhasil diubah.');

        // Redirect ke halaman sebelumnya atau halaman yang sesuai
        return redirect()->to('/dataBuku');
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

    public function saveData()
    {

        //validation
        $rules = [
            'judul' => [
                'rules' => 'required',
                'errors' => ['required' => 'Judul harus diisi']
            ]

        ];

        if (!$this->validate($rules)) {
            return redirect()->to(base_url('/dataBuku'))
                ->withInput()
                ->with('errors', $this->validator->listErrors());
        }

        $idPetugas = session()->get('id_petugas');
        if (empty($idPetugas)) {
            die('Error: id_petugas tidak valid');
        }

        $foto = $this->request->getFile('gambar');
        $dafaultImg = 'no_cover.jpeg';

        if ($foto->isValid() && !$foto->hasMoved()) {
            $fotoName = $foto->getRandomName();
            $foto->move('img/perpustakaan', $fotoName);
        } else {
            // Handle file upload error
            // return redirect()->to(base_url('/inputData'))
            //     ->withInput()
            //     ->with('errors', $foto->getErrorString());
            $fotoName = $dafaultImg;
        }
        // Simpan data pengunjung
        $this->M_Perpustakaan->save([

            'kode' => $this->request->getVar('kode'),
            'judul' => $this->request->getVar('judul'),
            'pengarang' => $this->request->getVar('pengarang'),
            'penerbit' => $this->request->getVar('penerbit'),
            'tempatTerbit' => $this->request->getVar('tempatTerbit'),
            'tahunTerbit' => $this->request->getVar('tahunTerbit'),
            'rak' => $this->request->getVar('rak'),
            'eksemplar' => $this->request->getVar('eksemplar'),
            'status' => $this->request->getVar('status'),
            'keterangan' => $this->request->getVar('keterangan'),
            'kategoriBuku' => $this->request->getVar('kategoriBuku'),
            'id_petugas' => $idPetugas,
            'foto' => $fotoName,



        ]);

        //alert
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan.');

        return redirect()->to('/dataBuku');
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
