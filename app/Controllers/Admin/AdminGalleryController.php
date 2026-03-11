<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\M_Gallery;

class AdminGalleryController extends BaseController
{
    protected $helpers = ['form'];
    protected $M_Gallery;

    public function __construct()
    {
        helper('form');
        $this->M_Gallery = new M_Gallery();
    }

    public function galleryAdmin(): string
    {
        $gallery = $this->M_Gallery->findAll();

        $data = [
            'title' => 'Daftar gallery',
            'gallery' => $gallery
        ];

        return view('CompanyProfile/galleryAdmin', $data);
    }

    public function saveGallery()
    {
        $rules = [
            'judul' => [
                'rules' => 'required',
                'errors' => ['required' => 'Judul harus diisi']
            ],
            'deskripsi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Deskripsi tidak boleh kosong',
                ]
            ],
        ];

        if (!$this->validate($rules)) {
            return redirect()->to('/galleryAdmin')->withInput()->with('errors', $this->validator->listErrors());
        }

        $foto = $this->request->getFile('foto');

        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            $fotoName = $foto->getRandomName();
            $foto->move('img/galery', $fotoName);
        } else {
            return redirect()->to(base_url('/galleryAdmin'))
                ->withInput()
                ->with('errors', $foto ? $foto->getErrorString() : 'Foto diperlukan');
        }

        $this->M_Gallery->save([
            'judul' => $this->request->getVar('judul'),
            'deskripsi' => $this->request->getVar('deskripsi'),
            'foto' => $fotoName,
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan.');

        return redirect()->to('/galleryAdmin');
    }

    public function deleteGallery($id_gallery)
    {
        $id_gallery = filter_var($id_gallery, FILTER_SANITIZE_NUMBER_INT);
        $this->M_Gallery->delete($id_gallery);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus.');

        return redirect()->to('/galleryAdmin');
    }

    public function updateGallery($id_gallery)
    {
        $dataToUpdate = [
            'judul' => $this->request->getVar('judul'),
            'no' => $this->request->getVar('no'),
            'deskripsi' => $this->request->getVar('deskripsi'),
            'foto' => $this->request->getVar('foto'),
        ];

        $foto = $this->request->getFile('foto');

        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            $fotoName = $foto->getRandomName();
            $foto->move('img/galery', $fotoName);
            $dataToUpdate['foto'] = $fotoName;
        }

        $dataToUpdate = array_filter($dataToUpdate);

        if (!empty($dataToUpdate)) {
            $this->M_Gallery->update($id_gallery, $dataToUpdate);
            $newDataGallery = $this->M_Gallery->getGallery($id_gallery);

            if (session()->get('level') != 'Admin') {
                session()->set([
                    'judul' => $newDataGallery['judul'],
                    'no' => $newDataGallery['no'],
                    'deskripsi' => $newDataGallery['deskripsi'],
                    'foto' => $newDataGallery['foto'],
                ]);
            }
            session()->setFlashdata('pesan', 'Data Berhasil diubah.');
        } else {
            session()->setFlashdata('error', 'Tidak ada data yang diupdate.');
        }

        return redirect()->to('/galleryAdmin');
    }
}
