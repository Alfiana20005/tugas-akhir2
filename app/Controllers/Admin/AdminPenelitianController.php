<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\M_Penelitian;

class AdminPenelitianController extends BaseController
{
    protected $helpers = ['form'];
    protected $M_Penelitian;

    public function __construct()
    {
        helper('form');
        $this->M_Penelitian = new M_Penelitian();
    }

    public function tambahPenelitian(): string
    {
        $penelitian = $this->M_Penelitian->findAll();

        $data = [
            'title' => 'Daftar Penelitian',
            'penelitian' => $penelitian
        ];

        return view('CompanyProfile/penelitian', $data);
    }

    public function savePenelitian()
    {
        $rules = [
            'judul' => [
                'rules' => 'required',
                'errors' => ['required' => 'Judul harus diisi']
            ],
            'penulis' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'tanggal tidak boleh kosong',
                ]
            ],
            'abstrak' => [
                'rules' => 'max_length[1000]',
                'errors' => [
                    'max_length' => 'Sinopsis tidak boleh lebih dari 1000 karakter',
                ]
            ],
        ];

        if (!$this->validate($rules)) {
            return redirect()->to('/dataPenelitian')->withInput()->with('errors', $this->validator->listErrors());
        }

        $foto = $this->request->getFile('foto');

        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            $fotoName = $foto->getRandomName();
            $foto->move('img/penelitian', $fotoName);
        } else {
            return redirect()->to(base_url('/dataPenelitian'))
                ->withInput()
                ->with('errors', $foto ? $foto->getErrorString() : 'Foto diperlukan');
        }

        $this->M_Penelitian->save([
            'judul' => $this->request->getVar('judul'),
            'penulis' => $this->request->getVar('penulis'),
            'abstrak' => $this->request->getVar('abstrak'),
            'tanggal' => date("Y-m-d"), // Add current date mapping
            'link' => $this->request->getVar('link'),
            'foto' => $fotoName,
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan.');

        return redirect()->to('/dataPenelitian');
    }

    public function deletePenelitian($id_penelitian)
    {
        $id_penelitian = filter_var($id_penelitian, FILTER_SANITIZE_NUMBER_INT);
        $this->M_Penelitian->delete($id_penelitian);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus.');

        return redirect()->to('/dataPenelitian');
    }

    public function updatePenelitian($id_penelitian)
    {
        $dataToUpdate = [
            'judul' => $this->request->getVar('judul'),
            'penulis' => $this->request->getVar('penulis'),
            'abstrak' => $this->request->getVar('abstrak'),
            'link' => $this->request->getVar('link'),
        ];

        $foto = $this->request->getFile('foto');

        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            $fotoName = $foto->getRandomName();
            $foto->move('img/penelitian', $fotoName);
            $dataToUpdate['foto'] = $fotoName;
        }

        $dataToUpdate = array_filter($dataToUpdate, function ($value) {
            return $value !== null && $value !== '';
        });

        if (!empty($dataToUpdate)) {
            $this->M_Penelitian->update($id_penelitian, $dataToUpdate);
            $newDataPublikasi = $this->M_Penelitian->getPenelitian($id_penelitian);

            if (session()->get('level') != 'Admin') {
                session()->set([
                    'judul' => $newDataPublikasi['judul'],
                    'penulis' => $newDataPublikasi['penulis'],
                    'abstrak' => $newDataPublikasi['abstrak'],
                    'link' => $newDataPublikasi['link'],
                    'foto' => $newDataPublikasi['foto'],
                ]);
            }
            session()->setFlashdata('pesan', 'Data Berhasil diubah.');
        } else {
            session()->setFlashdata('error', 'Tidak ada data yang diupdate.');
        }

        return redirect()->to('/dataPenelitian');
    }
}
