<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\M_Pameran;

class AdminPameranController extends BaseController
{
    protected $helpers = ['form'];
    protected $M_Pameran;

    public function __construct()
    {
        helper('form');
        $this->M_Pameran = new M_Pameran();
    }

    public function pameran(): string
    {
        $data_pameran = $this->M_Pameran->findAll();

        $data = [
            'title' => 'Daftar Pameran',
            'data_pameran' => $data_pameran
        ];

        return view('CompanyProfile/pameran', $data);
    }

    public function tambahPameran(): string
    {
        return view('CompanyProfile/tambahPameran');
    }

    public function savePameran()
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
            return redirect()->to('/tambahPameran')->withInput()->with('errors', $this->validator->listErrors());
        }

        $foto = $this->request->getFile('foto');

        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            $fotoName = $foto->getRandomName();
            $foto->move('img/pameran', $fotoName);
        } else {
            return redirect()->to(base_url('/tambahPameran'))
                ->withInput()
                ->with('errors', $foto ? $foto->getErrorString() : 'Foto diperlukan');
        }

        $this->M_Pameran->save([
            'judul' => $this->request->getVar('judul'),
            'tanggal' => $this->request->getVar('tanggal'),
            'keterangan' => $this->request->getVar('keterangan'),
            'link' => $this->request->getVar('link'),
            'foto' => $fotoName,
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan.');

        return redirect()->to('/dataPameran');
    }

    public function deletePameran($id_pameran)
    {
        $id_pameran = filter_var($id_pameran, FILTER_SANITIZE_NUMBER_INT);
        $this->M_Pameran->delete($id_pameran);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus.');

        return redirect()->to('/dataPameran');
    }

    public function updatePameran($id_pameran)
    {
        $dataToUpdate = [
            'judul' => $this->request->getVar('judul'),
            'tanggal' => $this->request->getVar('tanggal'),
            'keterangan' => $this->request->getVar('keterangan'),
            'link' => $this->request->getVar('link'),
            'foto' => $this->request->getVar('foto'),
        ];

        $foto = $this->request->getFile('foto');

        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            $fotoName = $foto->getRandomName();
            $foto->move('img/pameran', $fotoName);
            $dataToUpdate['foto'] = $fotoName;
        }

        $dataToUpdate = array_filter($dataToUpdate);

        if (!empty($dataToUpdate)) {
            $this->M_Pameran->update($id_pameran, $dataToUpdate);
            $newDataPameran = $this->M_Pameran->getPameran($id_pameran);

            if (session()->get('level') != 'Admin') {
                session()->set([
                    'judul' => $newDataPameran['judul'],
                    'tanggal' => $newDataPameran['tanggal'],
                    'keterangan' => $newDataPameran['keterangan'],
                    'link' => $newDataPameran['link'],
                    'foto' => $newDataPameran['foto'],
                ]);
            }
            session()->setFlashdata('pesan', 'Data Berhasil diubah.');
        } else {
            session()->setFlashdata('error', 'Tidak ada data yang diupdate.');
        }

        return redirect()->to('/dataPameran');
    }
}
