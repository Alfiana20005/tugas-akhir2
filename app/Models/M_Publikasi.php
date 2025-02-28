<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Publikasi extends Model
{
    protected $table = 'publikasi';
    protected $primaryKey = 'id_publikasi';
    protected $useTimestamps = false;


    // protected $allowedFields = ['foto', 'nama','password','email','username','level'];
    protected $allowedFields = ['judul', 'tanggal', 'foto', 'link'];


    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;
    protected $cleanValidationRules = true;

    public function getPublikasi($id_publikasi)
    {
        return $this->find($id_publikasi);
    }
    public function getKegiatanTeratas()
    {
        return $this->orderBy('tanggal', 'DESC')
            ->findAll();
    }
}
