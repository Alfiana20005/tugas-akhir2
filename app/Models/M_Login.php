<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Login extends Model
{
    protected $table = 'petugas';
    protected $primaryKey = 'id_petugas';
    protected $useTimestamps = true;


    protected $allowedFields = ['foto', 'nama','password','email','username','level'];

    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;
    protected $cleanValidationRules = true;

    public function login($username, $password) 
    {
        return $this->M_Petugas->where([
            'username' => $username,
            'password' => $password
        ])->getRowArray();
        
    }

    
}
    
