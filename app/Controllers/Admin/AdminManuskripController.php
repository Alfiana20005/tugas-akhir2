<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\M_Manuskrip;
use App\Models\M_ManuskripKol;

class AdminManuskripController extends BaseController
{
    protected $helpers = ['form'];
    protected $M_Manuskrip;
    protected $M_ManuskripKol;

    public function __construct()
    {
        helper('form');
        $this->M_Manuskrip = new M_Manuskrip();
        $this->M_ManuskripKol = new M_ManuskripKol();
    }

    public function dataManuskrip(): string
    {
        $data_manuskrip = $this->M_Manuskrip->findAll();

        $data = [
            'title' => 'Daftar Manuskrip',
            'data_manuskrip' => $data_manuskrip
        ];

        return view('CompanyProfile/data_manuskrip', $data);
    }

    public function saveManuskrip()
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
            return redirect()->to('/dataManuskrip')->withInput()->with('errors', $this->validator->listErrors());
        }

        $foto = $this->request->getFile('foto');

        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            $fotoName = $foto->getRandomName();
            $foto->move('img/manuskrip', $fotoName);
        } else {
            return redirect()->to(base_url('/dataManuskrip'))
                ->withInput()
                ->with('errors', $foto ? $foto->getErrorString() : 'Foto diperlukan');
        }

        $this->M_Manuskrip->save([
            'judul' => $this->request->getVar('judul'),
            'tanggal' => $this->request->getVar('tanggal'),
            'link' => $this->request->getVar('link'),
            'foto' => $fotoName,
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan.');

        return redirect()->to('/dataManuskrip');
    }

    public function deleteManuskrip($id_manuskrip)
    {
        $id_manuskrip = filter_var($id_manuskrip, FILTER_SANITIZE_NUMBER_INT);
        $this->M_Manuskrip->delete($id_manuskrip);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus.');

        return redirect()->to('/dataManuskrip');
    }

    public function updateManuskrip($id_manuskrip)
    {
        $dataToUpdate = [
            'judul' => $this->request->getVar('judul'),
            'tanggal' => $this->request->getVar('tanggal'),
            'link' => $this->request->getVar('link'),
            'foto' => $this->request->getVar('foto'),
        ];

        $foto = $this->request->getFile('foto');

        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            $fotoName = $foto->getRandomName();
            $foto->move('img/manuskrip', $fotoName);
            $dataToUpdate['foto'] = $fotoName;
        }

        $dataToUpdate = array_filter($dataToUpdate);

        if (!empty($dataToUpdate)) {
            $this->M_Manuskrip->update($id_manuskrip, $dataToUpdate);
            $newDataPublikasi = $this->M_Manuskrip->getManuskrip($id_manuskrip);

            if (session()->get('level') != 'Admin') {
                session()->set([
                    'judul' => $newDataPublikasi['judul'],
                    'tanggal' => $newDataPublikasi['tanggal'],
                    'link' => $newDataPublikasi['link'],
                    'foto' => $newDataPublikasi['foto'],
                ]);
            }
            session()->setFlashdata('pesan', 'Data Berhasil diubah.');
        } else {
            session()->setFlashdata('error', 'Tidak ada data yang diupdate.');
        }

        return redirect()->to('/dataManuskrip');
    }

    public function dataManuskripKol(): string
    {
        $data_manuskripKol = $this->M_ManuskripKol->findAll();

        $data = [
            'title' => 'Daftar Manuskrip Kol',
            'data_manuskripKol' => $data_manuskripKol
        ];

        return view('CompanyProfile/data_manuskripKol', $data);
    }

    public function saveManuskripKol()
    {
        $rules = [
            'nama' => [
                'rules' => 'required',
                'errors' => ['required' => 'nama harus diisi']
            ],
            'link' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'link tidak boleh kosong',
                ]
            ],
        ];

        if (!$this->validate($rules)) {
            return redirect()->to('/dataManuskripKol')->withInput()->with('errors', $this->validator->listErrors());
        }

        $foto = $this->request->getFile('foto');

        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            $fotoName = $foto->getRandomName();
            $foto->move('img/manuskrip', $fotoName);
        } else {
            return redirect()->to(base_url('/dataManuskripKol'))
                ->withInput()
                ->with('errors', $foto ? $foto->getErrorString() : 'Foto diperlukan');
        }

        $this->M_ManuskripKol->save([
            'nama' => $this->request->getVar('nama'),
            'link' => $this->request->getVar('link'),
            'foto' => $fotoName,
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan.');

        return redirect()->to('/dataManuskripKol');
    }

    public function deleteManuskripKol($id)
    {
        $id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
        $this->M_ManuskripKol->delete($id);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus.');

        return redirect()->to('/dataManuskripKol');
    }

    public function updateManuskripKol($id)
    {
        $dataToUpdate = [
            'nama' => $this->request->getVar('nama'),
            'link' => $this->request->getVar('link'),
            'foto' => $this->request->getVar('foto'),
        ];

        $foto = $this->request->getFile('foto');

        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            $fotoName = $foto->getRandomName();
            $foto->move('img/manuskrip', $fotoName);
            $dataToUpdate['foto'] = $fotoName;
        }

        $dataToUpdate = array_filter($dataToUpdate);

        if (!empty($dataToUpdate)) {
            $this->M_ManuskripKol->update($id, $dataToUpdate);
            $newDataPublikasi = $this->M_ManuskripKol->getManuskrip($id);

            session()->set([
                'nama' => $newDataPublikasi['nama'],
                'link' => $newDataPublikasi['link'],
                'foto' => $newDataPublikasi['foto'],
            ]);

            session()->setFlashdata('pesan', 'Data Berhasil diubah.');
        } else {
            session()->setFlashdata('error', 'Tidak ada data yang diupdate.');
        }

        return redirect()->to('/dataManuskripKol');
    }

    public function aksesManuskrip()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('users_public');

        $users = $builder->get()->getResult();

        $data = [
            'title' => 'Akses Manuskrip',
            'users' => $users
        ];

        return view('admin/akses_manuskrip', $data);
    }

    public function acceptedUpdate()
    {
        $user_id = $this->request->getPost('user_id');
        $accepted = $this->request->getPost('accepted');

        $db = \Config\Database::connect();
        $builder = $db->table('users_public');

        $builder->where('id', $user_id);
        $builder->update(['accepted' => $accepted]);

        return redirect()->to('/aksesManuskrip')->with('message', 'Status accepted berhasil diupdate.');
    }
}
