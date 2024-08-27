<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Manuskrip extends Model
{
    protected $table = 'manuskrip';
    protected $primaryKey = 'id_manuskrip';
    protected $useTimestamps = false;


    // protected $allowedFields = ['foto', 'nama','password','email','username','level'];
    protected $allowedFields = ['judul','tanggal', 'foto', 'link'];


    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;
    protected $cleanValidationRules = true;

    public function getManuskrip($id_manuskrip)
    {
        return $this->find($id_manuskrip);
    }
    
  

    
}
    
