<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\M_Berita;

class AdminBeritaController extends BaseController
{
    protected $helpers = ['form'];
    protected $Berita;

    public function __construct()
    {
        helper('form');
        $this->Berita = new M_Berita();
    }

    public function berita(): string
    {
        $dataBerita = $this->Berita->orderBy('tanggal', 'DESC')->findAll();

        $data = [
            'title' => 'Daftar Berita',
            'dataBerita' => $dataBerita
        ];

        return view('CompanyProfile/beritaAdmin', $data);
    }

    public function tambahBerita(): string
    {
        return view('CompanyProfile/tambahBerita');
    }

    public function save()
    {
        $rules = [
            'judul' => [
                'rules' => 'required',
                'errors' => ['required' => 'Judul harus diisi']
            ],
            'tanggal' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'tanggal tidak boleh kosong',
                ]
            ],
        ];

        if (!$this->validate($rules)) {
            return redirect()->to('/beritaAdmin')->withInput()->with('errors', $this->validator->listErrors());
        }

        $foto = $this->request->getFile('foto');
        $removeFoto = $this->request->getVar('removeFoto');

        if ($removeFoto) {
            $fotoName = null;
        } else {
            if ($foto && $foto->isValid() && !$foto->hasMoved()) {
                $fotoName = $foto->getRandomName();
                $foto->move('img/berita', $fotoName);
            } else {
                $fotoName = $this->request->getVar('existingFoto');
            }
        }

        $this->Berita->save([
            'judul' => $this->request->getVar('judul'),
            'tanggal' => $this->request->getVar('tanggal'),
            'type' => $this->request->getVar('type'),
            'kategoriBerita' => $this->request->getVar('kategoriBerita'),
            'isi' => $this->request->getVar('isi'),
            'ketgambar' => $this->request->getVar('ketgambar'),
            'jenisBerita' => $this->request->getVar('jenisBerita'),
            'foto' => $fotoName,
            'sumber' => $this->request->getVar('sumber'),
            'link' => $this->request->getVar('link'),
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan.');

        return redirect()->to('/beritaAdmin');
    }

    public function deleteBerita($id_berita)
    {
        $id_berita = filter_var($id_berita, FILTER_SANITIZE_NUMBER_INT);
        $this->Berita->delete($id_berita);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus.');

        return redirect()->to('/beritaAdmin');
    }

    public function updateBerita($id_berita)
    {
        $dataToUpdate = [
            'judul' => $this->request->getVar('judul'),
            'tanggal' => $this->request->getVar('tanggal'),
            'type' => $this->request->getVar('type'),
            'kategoriBerita' => $this->request->getVar('kategoriBerita'),
            'isi' => $this->request->getVar('isi'),
            'foto' => $this->request->getVar('foto'),
            'ketgambar' => $this->request->getVar('ketgambar'),
            'jenisBerita' => $this->request->getVar('jenisBerita'),
            'sumber' => $this->request->getVar('sumber'),
            'link' => $this->request->getVar('link'),
        ];

        $foto = $this->request->getFile('foto');

        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            $fotoName = $foto->getRandomName();
            $foto->move('img/berita', $fotoName);
            $dataToUpdate['foto'] = $fotoName;
        }

        $dataToUpdate = array_filter($dataToUpdate);

        if (!empty($dataToUpdate)) {
            $this->Berita->update($id_berita, $dataToUpdate);
            $newDataBerita = $this->Berita->getBerita($id_berita);

            if (session()->get('level') != 'Admin') {
                session()->set([
                    'judul' => $newDataBerita['judul'],
                    'tanggal' => $newDataBerita['tanggal'],
                    'type' => $newDataBerita['type'],
                    'kategoriBerita' => $newDataBerita['kategoriBerita'],
                    'isi' => $newDataBerita['isi'],
                    'foto' => $newDataBerita['foto'],
                    'ketgambar' => $newDataBerita['ketgambar'],
                    'jenisBerita' => $newDataBerita['jenisBerita'],
                    'sumber' => $newDataBerita['sumber'],
                    'link' => $newDataBerita['link'],
                ]);
            }
            session()->setFlashdata('pesan', 'Data Berhasil diubah.');
        } else {
            session()->setFlashdata('error', 'Tidak ada data yang diupdate.');
        }

        return redirect()->to('/beritaAdmin');
    }
}
