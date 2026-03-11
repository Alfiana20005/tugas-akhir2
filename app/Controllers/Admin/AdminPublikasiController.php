<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\M_Publikasi;

class AdminPublikasiController extends BaseController
{
    protected $helpers = ['form'];
    protected $M_Publikasi;

    public function __construct()
    {
        helper('form');
        $this->M_Publikasi = new M_Publikasi();
    }

    public function tambahPublikasi(): string
    {
        $data_publikasi = $this->M_Publikasi->findAll();

        $data = [
            'title' => 'Daftar Kegiatan',
            'data_publikasi' => $data_publikasi
        ];

        return view('CompanyProfile/publikasiAdmin', $data);
    }

    public function savePublikasi()
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
            'sinopsis' => [
                'rules' => 'max_length[1000]',
                'errors' => [
                    'max_length' => 'Sinopsis tidak boleh lebih dari 1000 karakter',
                ]
            ],
        ];

        if (!$this->validate($rules)) {
            return redirect()->to('/tambahPublikasi')->withInput()->with('errors', $this->validator->listErrors());
        }

        $foto = $this->request->getFile('foto');

        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            $fotoName = $foto->getRandomName();
            $foto->move('img/publikasi', $fotoName);
        } else {
            return redirect()->to(base_url('/tambahPublikasi'))
                ->withInput()
                ->with('errors', $foto ? $foto->getErrorString() : 'Foto diperlukan');
        }

        $this->M_Publikasi->save([
            'judul' => $this->request->getVar('judul'),
            'penulis' => $this->request->getVar('penulis'),
            'sinopsis' => $this->request->getVar('sinopsis'),
            'tanggal' => $this->request->getVar('tanggal'),
            'link' => $this->request->getVar('link'),
            'foto' => $fotoName,
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan.');

        return redirect()->to('/tambahPublikasi');
    }

    public function deletePublikasi($id_publikasi)
    {
        $id_publikasi = filter_var($id_publikasi, FILTER_SANITIZE_NUMBER_INT);
        $this->M_Publikasi->delete($id_publikasi);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus.');

        return redirect()->to('/tambahPublikasi');
    }

    public function updatePublikasi($id_publikasi)
    {
        $dataToUpdate = [
            'judul' => $this->request->getVar('judul'),
            'penulis' => $this->request->getVar('penulis'),
            'sinopsis' => $this->request->getVar('sinopsis'),
            'tanggal' => $this->request->getVar('tanggal'),
            'link' => $this->request->getVar('link'),
        ];

        $foto = $this->request->getFile('foto');

        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            $fotoName = $foto->getRandomName();
            $foto->move('img/publikasi', $fotoName);
            $dataToUpdate['foto'] = $fotoName;
        }

        $dataToUpdate = array_filter($dataToUpdate, function ($value) {
            return $value !== null && $value !== '';
        });

        if (!empty($dataToUpdate)) {
            $this->M_Publikasi->update($id_publikasi, $dataToUpdate);
            $newDataPublikasi = $this->M_Publikasi->getPublikasi($id_publikasi);

            if (session()->get('level') != 'Admin') {
                session()->set([
                    'judul' => $newDataPublikasi['judul'],
                    'penulis' => $newDataPublikasi['penulis'],
                    'sinopsis' => $newDataPublikasi['sinopsis'],
                    'tanggal' => $newDataPublikasi['tanggal'],
                    'link' => $newDataPublikasi['link'],
                    'foto' => $newDataPublikasi['foto'],
                ]);
            }
            session()->setFlashdata('pesan', 'Data Berhasil diubah.');
        } else {
            session()->setFlashdata('error', 'Tidak ada data yang diupdate.');
        }

        return redirect()->to('/tambahPublikasi');
    }
}
