<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\M_SemuaPetugas;

class AdminProfileController extends BaseController
{
    protected $helpers = ['form'];
    protected $M_SemuaPetugas;

    public function __construct()
    {
        helper('form');
        $this->M_SemuaPetugas = new M_SemuaPetugas();
    }

    public function strukturOrganisasi()
    {
        $dataPetugas = $this->M_SemuaPetugas->findAll();

        $data = [
            'title' => 'Struktur Organisasi',
            'dataPetugas' => $dataPetugas,
        ];

        return view('CompanyProfile/strukturAdmin', $data);
    }

    public function petugasMuseum()
    {
        //validation
        $rules = [
            'nama' => [
                'rules' => 'required',
                'errors' => ['required' => 'Judul harus diisi']
            ],
        ];

        if (!$this->validate($rules)) {
            return redirect()->to('/strukturOrganisasi')->withInput()->with('errors', $this->validator->listErrors());
        }

        $foto = $this->request->getFile('foto');

        if ($foto->isValid() && !$foto->hasMoved()) {
            $fotoName = $foto->getRandomName();
            $foto->move('img/semuaPetugas', $fotoName);
        } else {
            return redirect()->to(base_url('/strukturOrganisasi'))
                ->withInput()
                ->with('errors', $foto->getErrorString());
        }

        //tambahh data
        $this->M_SemuaPetugas->save([
            'nama' => $this->request->getVar('nama'),
            'nip' => $this->request->getVar('nip'),
            'jabatan' => $this->request->getVar('jabatan'),
            'urutan' => $this->request->getVar('urutan'),
            'foto' => $fotoName,
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan.');

        return redirect()->to('/strukturOrganisasi');
    }

    public function updateKaryawan($id_karyawan)
    {
        $dataToUpdate = [
            'nama' => $this->request->getVar('nama'),
            'nip' => $this->request->getVar('nip'),
            'jabatan' => $this->request->getVar('jabatan'),
            'urutan' => $this->request->getVar('urutan'),
            'foto' => $this->request->getVar('foto'),
        ];

        $foto = $this->request->getFile('foto');

        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            $fotoName = $foto->getRandomName();
            $foto->move('img/semuaPetugas', $fotoName);
            $dataToUpdate['foto'] = $fotoName;
        }

        $dataToUpdate = array_filter($dataToUpdate);

        if (!empty($dataToUpdate)) {
            $this->M_SemuaPetugas->update($id_karyawan, $dataToUpdate);
            $newDataKaryawan = $this->M_SemuaPetugas->getKaryawan($id_karyawan);

            if (session()->get('level') != 'Admin') {
                session()->set([
                    'nama' => $newDataKaryawan['nama'],
                    'nip' => $newDataKaryawan['nip'],
                    'jabatan' => $newDataKaryawan['jabatan'],
                    'urutan' => $newDataKaryawan['urutan'],
                    'foto' => $newDataKaryawan['foto'],
                ]);
            }
            session()->setFlashdata('pesan', 'Data Berhasil diubah.');
        } else {
            session()->setFlashdata('error', 'Tidak ada data yang diupdate.');
        }

        return redirect()->to('/strukturOrganisasi');
    }

    public function hapusOrganisasi($id_karyawan)
    {
        $id_karyawan = filter_var($id_karyawan, FILTER_SANITIZE_NUMBER_INT);
        $this->M_SemuaPetugas->delete($id_karyawan);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus.');

        return redirect()->to('/strukturOrganisasi');
    }
}
