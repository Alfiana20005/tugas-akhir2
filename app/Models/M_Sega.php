<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Sega extends Model
{
    protected $table = 'sega';
    protected $primaryKey = 'id_sega';
    protected $useTimestamps = false;


    // protected $allowedFields = ['foto', 'nama','password','email','username','level'];
    protected $allowedFields = ['judul','deskripsi_indo', 'foto', 'audio1', 'audio2','deskripsi_eng'];


    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;
    protected $cleanValidationRules = true;

    public function getsega($id_sega)
    {
        return $this->find($id_sega);
    }

  

    
}
    
