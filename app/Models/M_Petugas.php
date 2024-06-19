<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Petugas extends Model
{
    protected $table = 'petugas';
    protected $primaryKey = 'id_petugas';
    protected $useTimestamps = true;


    // protected $allowedFields = ['foto', 'nama','password','email','username','level'];
    protected $allowedFields = ['nip','foto', 'nama', 'password', 'email', 'username', 'level'];


    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;
    protected $cleanValidationRules = true;

    public function getPetugas($id_petugas)
    {
        return $this->find($id_petugas);
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
    public function countPetugas()
    {
        // Membuat instansiasi model
        $model = new M_Petugas();

        // Menghitung jumlah petugas
        $totalPetugas = $model->countAll();

        return $totalPetugas;
    }
    public function getUserRoles($id_petugas) {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT level FROM petugas WHERE id_petugas = ?", [$id_petugas]);
        return $query->getResultArray();
    }
  

    
}
    
