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
            'nama' => [
                'rules' => 'required',
                'errors' => ['required' => 'Nama tidak boleh kosong']
            ],
            'no_identitas' => [
                'rules' => 'required',
                'errors' => ['required' => 'Nomor Identitas tidak boleh kosong']
            ],
            'judul_penelitian' => [
                'rules' => 'required',
                'errors' => ['required' => 'Judul Penelitian tidak boleh kosong']
            ],
            'gambar' => [
                'rules' => 'uploaded[gambar]|max_size[gambar,2048]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => 'Pilih gambar terlebih dahulu',
                    'max_size' => 'Ukuran gambar maksimal 2MB',
                    'is_image' => 'Yang Anda pilih bukan gambar',
                    'mime_in' => 'Yang Anda pilih bukan gambar file'
                ]
            ],
        ];

        if (!$this->validate($rules)) {
            return redirect()->to('/dataPenelitian')->withInput()->with('errors', $this->validator->listErrors());
        }

        $gambar = $this->request->getFile('gambar');

        if ($gambar && $gambar->isValid() && !$gambar->hasMoved()) {
            $gambarName = $gambar->getRandomName();
            $gambar->move('uploads/penelitian', $gambarName);
        } else {
            return redirect()->to(base_url('/dataPenelitian'))
                ->withInput()
                ->with('errors', $gambar ? $gambar->getErrorString() : 'Gambar diperlukan');
        }

        $this->M_Penelitian->save([
            'nama' => $this->request->getVar('nama'),
            'no_identitas' => $this->request->getVar('no_identitas'),
            'judul_penelitian' => $this->request->getVar('judul_penelitian'),
            'jenis' => $this->request->getVar('jenis'),
            'kategori_objek' => $this->request->getVar('kategori_objek'),
            'jenjang_pendidikan' => $this->request->getVar('jenjang_pendidikan'),
            'program_studi' => $this->request->getVar('program_studi'),
            'instansi' => $this->request->getVar('instansi'),
            'tanggal_mulai' => $this->request->getVar('tanggal_mulai'),
            'tanggal_akhir' => $this->request->getVar('tanggal_akhir'),
            'sumber' => $this->request->getVar('sumber'),
            'link' => $this->request->getVar('link'),
            'gambar' => $gambarName,
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan.');
        return redirect()->to('/dataPenelitian');
    }

    public function deletePenelitian($id_penelitian)
    {
        $id_penelitian = filter_var($id_penelitian, FILTER_SANITIZE_NUMBER_INT);
        $penelitian = $this->M_Penelitian->find($id_penelitian);

        if (!$penelitian) {
            session()->setFlashdata('error', 'Data gagal dihapus: Data penelitian tidak ditemukan.');
            return redirect()->to('/dataPenelitian');
        }

        $this->M_Penelitian->delete($id_penelitian);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus.');

        return redirect()->to('/dataPenelitian');
    }

    public function updatePenelitian($id_penelitian)
    {
        $id_penelitian = filter_var($id_penelitian, FILTER_SANITIZE_NUMBER_INT);
        $penelitian = $this->M_Penelitian->find($id_penelitian);

        if (!$penelitian) {
            session()->setFlashdata('error', 'Data gagal diubah: Data penelitian tidak ditemukan.');
            return redirect()->to('/dataPenelitian');
        }

        $rules = [
            'nama' => [
                'rules' => 'required',
                'errors' => ['required' => 'Nama tidak boleh kosong']
            ],
            'no_identitas' => [
                'rules' => 'required',
                'errors' => ['required' => 'Nomor Identitas tidak boleh kosong']
            ],
            'judul_penelitian' => [
                'rules' => 'required',
                'errors' => ['required' => 'Judul Penelitian tidak boleh kosong']
            ],
        ];

        $gambar = $this->request->getFile('gambar');
        
        // Only validate image if user selects a new image
        if ($gambar && $gambar->getError() != 4) { // Error 4 indicates no file was uploaded
            $rules['gambar'] = [
                'rules' => 'max_size[gambar,2048]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar maksimal 2MB',
                    'is_image' => 'Yang Anda pilih bukan gambar',
                    'mime_in' => 'Yang Anda pilih bukan gambar file'
                ]
            ];
        }

        if (!$this->validate($rules)) {
            return redirect()->to('/dataPenelitian')->withInput()->with('errors', $this->validator->listErrors());
        }

        $dataToUpdate = [
            'nama' => $this->request->getVar('nama'),
            'no_identitas' => $this->request->getVar('no_identitas'),
            'judul_penelitian' => $this->request->getVar('judul_penelitian'),
            'jenis' => $this->request->getVar('jenis'),
            'kategori_objek' => $this->request->getVar('kategori_objek'),
            'jenjang_pendidikan' => $this->request->getVar('jenjang_pendidikan'),
            'program_studi' => $this->request->getVar('program_studi'),
            'instansi' => $this->request->getVar('instansi'),
            'tanggal_mulai' => $this->request->getVar('tanggal_mulai'),
            'tanggal_akhir' => $this->request->getVar('tanggal_akhir'),
            'sumber' => $this->request->getVar('sumber'),
            'link' => $this->request->getVar('link'),
        ];

        if ($gambar && $gambar->isValid() && !$gambar->hasMoved()) {
            $gambarName = $gambar->getRandomName();
            $gambar->move('uploads/penelitian', $gambarName);
            $dataToUpdate['gambar'] = $gambarName;
        }

        $dataToUpdate = array_filter($dataToUpdate, function ($value) {
            return $value !== null; // Keep empty string
        });

        if (!empty($dataToUpdate)) {
            $this->M_Penelitian->update($id_penelitian, $dataToUpdate);
            session()->setFlashdata('pesan', 'Data Berhasil diubah.');
        } else {
            session()->setFlashdata('error', 'Tidak ada data yang diupdate.');
        }

        return redirect()->to('/dataPenelitian');
    }
}
