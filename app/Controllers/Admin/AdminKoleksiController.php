<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\M_KoleksiLandingPage;

class AdminKoleksiController extends BaseController
{
    protected $helpers = ['form'];
    protected $M_KoleksiLandingPage;

    public function __construct()
    {
        helper('form');
        $this->M_KoleksiLandingPage = new M_KoleksiLandingPage();
    }

    public function koleksiAdmin(): string
    {
        $koleksi = $this->M_KoleksiLandingPage->findAll();

        $data = [
            'title' => 'Daftar Koleksi',
            'koleksi' => $koleksi
        ];

        return view('CompanyProfile/koleksiAdmin', $data);
    }

    public function saveKoleksi()
    {
        $rules = [
            'nama' => [
                'rules' => 'required',
                'errors' => ['required' => 'Nama harus diisi']
            ],
            'no' => [
                'rules' => 'required',
                'errors' => ['required' => 'Nomor koleksi tidak boleh kosong']
            ],
            'foto' => [
                'rules' => 'uploaded[foto]|max_size[foto,2048]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => 'Foto utama harus diupload',
                    'max_size' => 'Ukuran foto maksimal 2MB',
                    'is_image' => 'File harus berupa gambar',
                    'mime_in' => 'Format file harus JPG, JPEG, atau PNG'
                ]
            ],
        ];

        if (!$this->validate($rules)) {
            return redirect()->to('/koleksiAdmin')->withInput()->with('errors', $this->validator->listErrors());
        }

        $foto = $this->request->getFile('foto');

        if ($foto->isValid() && !$foto->hasMoved()) {
            $fotoName = $foto->getRandomName();
            $foto->move('img/koleksiAdmin', $fotoName);
        } else {
            return redirect()->to(base_url('/koleksiAdmin'))
                ->withInput()
                ->with('errors', $foto->getErrorString());
        }

        $gambarDeskripsi = $this->request->getFileMultiple('gambar_deskripsi');
        $namaGambarArray = [];

        if ($gambarDeskripsi && count($gambarDeskripsi) > 0) {
            foreach ($gambarDeskripsi as $gambar) {
                if ($gambar->isValid() && !$gambar->hasMoved()) {
                    if ($gambar->getSize() <= 2048000 && in_array($gambar->getMimeType(), ['image/jpg', 'image/jpeg', 'image/png'])) {
                        $namaGambar = $gambar->getRandomName();
                        $gambar->move('img/koleksiDeskripsi', $namaGambar);
                        $namaGambarArray[] = $namaGambar;
                    }
                }
            }
        }

        $this->M_KoleksiLandingPage->save([
            'nama' => $this->request->getVar('nama'),
            'no' => $this->request->getVar('no'),
            'deskripsi' => $this->request->getVar('deskripsi'),
            'ukuran' => $this->request->getVar('ukuran'),
            'kategori' => $this->request->getVar('kategori'),
            'foto' => $fotoName,
            'gambar_deskripsi' => json_encode($namaGambarArray), 
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan.');

        return redirect()->to('/koleksiAdmin');
    }

    public function deleteKoleksi($id_koleksi)
    {
        $id_koleksi = filter_var($id_koleksi, FILTER_SANITIZE_NUMBER_INT);
        $this->M_KoleksiLandingPage->delete($id_koleksi);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus.');

        return redirect()->to('/koleksiAdmin');
    }

    public function updateKoleksiAdmin($id_koleksi)
    {
        $dataToUpdate = [
            'nama' => $this->request->getVar('nama'),
            'no' => $this->request->getVar('no'),
            'kategori' => $this->request->getVar('kategori'),
            'ukuran' => $this->request->getVar('ukuran'),
            'deskripsi' => $this->request->getVar('deskripsi'),
        ];

        $foto = $this->request->getFile('foto');
        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            $koleksiLama = $this->M_KoleksiLandingPage->find($id_koleksi);
            if (!empty($koleksiLama['foto']) && file_exists('img/koleksiAdmin/' . $koleksiLama['foto'])) {
                unlink('img/koleksiAdmin/' . $koleksiLama['foto']);
            }

            $fotoName = $foto->getRandomName();
            $foto->move('img/koleksiAdmin', $fotoName);
            $dataToUpdate['foto'] = $fotoName;
        }

        $urutanBaru = $this->request->getPost('urutan_gambar');
        if (!empty($urutanBaru)) {
            $dataToUpdate['gambar_deskripsi'] = $urutanBaru;
        } else {
            $koleksiLama = $this->M_KoleksiLandingPage->find($id_koleksi);
            $existingImages = !empty($koleksiLama['gambar_deskripsi']) ? json_decode($koleksiLama['gambar_deskripsi'], true) : [];

            $gambarBaru = $this->request->getFileMultiple('gambar_deskripsi');

            if ($gambarBaru && is_array($gambarBaru)) {
                foreach ($gambarBaru as $gambar) {
                    if ($gambar->isValid() && !$gambar->hasMoved() && count($existingImages) < 2) {
                        if ($gambar->getSize() <= 2048000 && in_array($gambar->getMimeType(), ['image/jpg', 'image/jpeg', 'image/png'])) {
                            $namaGambar = $gambar->getRandomName();
                            $gambar->move('img/koleksiDeskripsi', $namaGambar);
                            $existingImages[] = $namaGambar;
                        }
                    }
                }
            }

            $dataToUpdate['gambar_deskripsi'] = json_encode($existingImages);
        }

        $dataToUpdate = array_filter($dataToUpdate, function ($value) {
            return $value !== null && $value !== '';
        });

        if (!empty($dataToUpdate)) {
            $this->M_KoleksiLandingPage->update($id_koleksi, $dataToUpdate);
            $newDataKoleksi = $this->M_KoleksiLandingPage->find($id_koleksi);

            if (session()->get('level') != 'Admin') {
                session()->set([
                    'nama' => $newDataKoleksi['nama'],
                    'no' => $newDataKoleksi['no'],
                    'ukuran' => $newDataKoleksi['ukuran'],
                    'kategori' => $newDataKoleksi['kategori'],
                    'deskripsi' => $newDataKoleksi['deskripsi'],
                    'foto' => $newDataKoleksi['foto'],
                ]);
            }

            session()->setFlashdata('pesan', 'Data Berhasil diubah.');
        } else {
            session()->setFlashdata('error', 'Tidak ada data yang diupdate.');
        }

        return redirect()->to('/koleksiAdmin');
    }

    public function hapusGambarDeskripsiByName()
    {
        $json = $this->request->getJSON();
        $id_koleksi = $json->id_koleksi;
        $image_name = $json->image_name;

        $koleksi = $this->M_KoleksiLandingPage->find($id_koleksi);

        if ($koleksi) {
            $gambar_array = json_decode($koleksi['gambar_deskripsi'], true);

            if (is_array($gambar_array)) {
                $key = array_search($image_name, $gambar_array);

                if ($key !== false) {
                    unset($gambar_array[$key]);
                    $gambar_array = array_values($gambar_array); 

                    $filePath = 'img/koleksiDeskripsi/' . $image_name;
                    if (file_exists($filePath)) {
                        unlink($filePath);
                    }

                    $this->M_KoleksiLandingPage->update($id_koleksi, [
                        'gambar_deskripsi' => json_encode($gambar_array)
                    ]);

                    return $this->response->setJSON(['success' => true, 'message' => 'Gambar berhasil dihapus']);
                }
            }
        }

        return $this->response->setJSON(['success' => false, 'message' => 'Gambar tidak ditemukan']);
    }
}
