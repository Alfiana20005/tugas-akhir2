<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\M_Pesan;

class AdminPesanController extends BaseController
{
    protected $M_Pesan;

    public function __construct()
    {
        $this->M_Pesan = new M_Pesan();
    }

    public function pesanAdmin(): string
    {
        $data_pesan = $this->M_Pesan->findAll();

        $data = [
            'title' => 'Daftar Pesan',
            'pesan' => $data_pesan
        ];

        return view('CompanyProfile/pesanAdmin', $data);
    }

    public function deletePesan($id_pesan)
    {
        $id_pesan = filter_var($id_pesan, FILTER_SANITIZE_NUMBER_INT);
        $this->M_Pesan->delete($id_pesan);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus.');

        return redirect()->to('/pesanAdmin');
    }
}
