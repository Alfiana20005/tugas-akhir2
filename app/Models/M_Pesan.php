<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Pesan extends Model
{
    protected $table = 'pesan';
    protected $primaryKey = 'id_pesan';
    protected $useTimestamps = true;


    // protected $allowedFields = ['foto', 'nama','password','email','username','level'];
    protected $allowedFields = ['nama','email', 'pesan', 'created_at', 'updated_at'];


    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;
    protected $cleanValidationRules = true;

    public function getPesan()
    {
        return $this->orderBy('tanggal', 'DESC')
                    ->findAll();
    }
    public function getPesanID($id_berita)
    {
        return $this->find($id_berita);
    }
  

    
}
    
