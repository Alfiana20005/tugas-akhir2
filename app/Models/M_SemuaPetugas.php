<?php

namespace App\Models;

use CodeIgniter\Model;

class M_SemuaPetugas extends Model
{
    protected $table = 'karyawan';
    protected $primaryKey = 'id_karyawan';
    protected $useTimestamps = true;


    // protected $allowedFields = ['foto', 'nama','password','email','username','level'];
    protected $allowedFields = ['nip','foto', 'nama', 'jabatan'];


    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;
    protected $cleanValidationRules = true;

    public function getKaryawan($id_karyawan)
    {
        return $this->find($id_karyawan);
    }
    public function getDataByLevel($level)
    {
        return $this->where('level', $level)->findAll();
    }
    public function login($username, $password) 
    {
        return $this->db->table('petugas')
            ->where([
                'username' => $username,
                'password' => $password
            ])->get()->getRowArray();
    }
    public function countKaryawan()
    {
        // Membuat instansiasi model
        $model = new M_SemuaPetugas();

        // Menghitung jumlah petugas
        $totalKaryawan = $model->countAll();

        return $totalKaryawan;
    }
  

    
}
    
