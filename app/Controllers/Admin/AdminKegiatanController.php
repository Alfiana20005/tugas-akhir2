<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\M_Kegiatan;

class AdminKegiatanController extends BaseController
{
    protected $helpers = ['form'];
    protected $M_Kegiatan;

    public function __construct()
    {
        helper('form');
        $this->M_Kegiatan = new M_Kegiatan();
    }

    public function tambahKegiatan(): string
    {
        $data_kegiatan = $this->M_Kegiatan->findAll();

        $data = [
            'title' => 'Daftar Kegiatan',
            'dataKegiatan' => $data_kegiatan
        ];

        return view('CompanyProfile/tambahKegiatan', $data);
    }

    public function saveKegiatan()
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
            return redirect()->to('/tambahKegiatan')->withInput()->with('errors', $this->validator->listErrors());
        }

        $foto = $this->request->getFile('foto');

        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            $fotoName = $foto->getRandomName();
            $foto->move('img/kegiatan', $fotoName);
        } else {
            return redirect()->to(base_url('/tambahKegiatan'))
                ->withInput()
                ->with('errors', $foto ? $foto->getErrorString() : 'Foto diperlukan');
        }

        $this->M_Kegiatan->save([
            'judul' => $this->request->getVar('judul'),
            'tanggal' => $this->request->getVar('tanggal'),
            'keterangan' => $this->request->getVar('keterangan'),
            'tampilkan' => $this->request->getVar('tampilkan'),
            'kategori_kegiatan' => $this->request->getVar('kategori_kegiatan'),
            'foto' => $fotoName,
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan.');

        return redirect()->to('/tambahKegiatan');
    }

    public function deleteKegiatan($id_kegiatan)
    {
        $id_kegiatan = filter_var($id_kegiatan, FILTER_SANITIZE_NUMBER_INT);
        $this->M_Kegiatan->delete($id_kegiatan);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus.');

        return redirect()->to('/tambahKegiatan');
    }

    public function updateKegiatan($id_kegiatan)
    {
        $dataToUpdate = [
            'judul' => $this->request->getVar('judul'),
            'tanggal' => $this->request->getVar('tanggal'),
            'tampilkan' => $this->request->getVar('tampilkan'),
            'keterangan' => $this->request->getVar('keterangan'),
            'kategori_kegiatan' => $this->request->getVar('kategori_kegiatan'),
            'foto' => $this->request->getVar('foto'),
        ];

        $foto = $this->request->getFile('foto');

        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            $fotoName = $foto->getRandomName();
            $foto->move('img/kegiatan', $fotoName);
            $dataToUpdate['foto'] = $fotoName;
        }

        $dataToUpdate = array_filter($dataToUpdate);

        if (!empty($dataToUpdate)) {
            $this->M_Kegiatan->update($id_kegiatan, $dataToUpdate);
            $newDataKegiatan = $this->M_Kegiatan->getKegiatan($id_kegiatan);

            if (session()->get('level') != 'Admin') {
                session()->set([
                    'judul' => $newDataKegiatan['judul'],
                    'tanggal' => $newDataKegiatan['tanggal'],
                    'tampilkan' => $newDataKegiatan['tampilkan'],
                    'keterangan' => $newDataKegiatan['keterangan'],
                    'kategori_kegiatan' => $newDataKegiatan['kategori_kegiatan'],
                    'foto' => $newDataKegiatan['foto'],
                ]);
            }
            session()->setFlashdata('pesan', 'Data Berhasil diubah.');
        } else {
            session()->setFlashdata('error', 'Tidak ada data yang diupdate.');
        }

        return redirect()->to('/tambahKegiatan');
    }
}
