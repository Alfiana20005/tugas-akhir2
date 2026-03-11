<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\M_Kajian;
use App\Models\M_Isikajian;

class AdminKajianController extends BaseController
{
    protected $helpers = ['form'];
    protected $M_Kajian;
    protected $M_Isikajian;

    public function __construct()
    {
        helper('form');
        $this->M_Kajian = new M_Kajian();
        $this->M_Isikajian = new M_Isikajian();
    }

    public function kajianAdmin(): string
    {
        $kajian = $this->M_Kajian->findAll();

        $data = [
            'title' => 'Daftar Kajian',
            'kajian' => $kajian
        ];

        return view('CompanyProfile/kajianAdmin', $data);
    }

    public function saveKajian()
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
            return redirect()->to('/kajianAdmin')->withInput()->with('errors', $this->validator->listErrors());
        }

        $foto = $this->request->getFile('sampul');

        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            $fotoName = $foto->getRandomName();
            $foto->move('img/kajian', $fotoName);
        } else {
            return redirect()->to(base_url('/kajianAdmin'))
                ->withInput()
                ->with('errors', $foto ? $foto->getErrorString() : 'Sampul diperlukan');
        }

        $this->M_Kajian->save([
            'judul' => $this->request->getVar('judul'),
            'created_at' => $this->request->getVar('tanggal'),
            'penulis' => $this->request->getVar('penulis'),
            'kategori' => $this->request->getVar('kategori'),
            'sampul' => $fotoName,
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan.');

        return redirect()->to('/kajianAdmin');
    }

    public function tulisKajian($id_kajian): string
    {
        $data_kajian = $this->M_Isikajian->findAll();
        $kajian = $this->M_Kajian->getKajian($id_kajian);

        $data = [
            'title' => 'Daftar Kegiatan',
            'kajian' => $kajian,
            'data_kajian' => $data_kajian,
        ];

        return view('CompanyProfile/tulisKajian', $data);
    }

    public function saveIsiKajian()
    {
        $id_kajian = $this->request->getPost('id_kajian');
        $foto = $this->request->getFile('foto');
        $removeFoto = $this->request->getVar('removeFoto');

        if ($removeFoto) {
            $fotoName = null; 
        } else {
            if ($foto && $foto->isValid() && !$foto->hasMoved()) {
                $fotoName = $foto->getRandomName();
                $foto->move('img/kajian', $fotoName);
            } else {
                $fotoName = $this->request->getVar('existingFoto'); 
            }
        }

        $this->M_Isikajian->save([
            'narasi' => $this->request->getVar('narasi'),
            'id_kajian' => $this->request->getVar('id_kajian'),
            'foto' => $fotoName,
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan.');

        return redirect()->to('/tulisKajian/' . $id_kajian);
    }

    public function previewKajian($id_kajian): string
    {
        $kajian = $this->M_Kajian->getKajian($id_kajian);
        $kajianTerbaru = $this->M_Kajian->getKajianTerbaru(5);
        $IsiKajian = $this->M_Isikajian->getDataByIdKajian($id_kajian);

        $data = [
            'kajian' => $kajian,
            'kajianTerbaru' => $kajianTerbaru,
            'isiKajian' => $IsiKajian,
        ];

        return view('CompanyProfile/previewKajian', $data);
    }

    public function deleteKajian($id_kajian)
    {
        $id_kajian = filter_var($id_kajian, FILTER_SANITIZE_NUMBER_INT);
        $this->M_Kajian->delete($id_kajian);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus.');

        return redirect()->to('/kajianAdmin');
    }
}
