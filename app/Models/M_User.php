<?php

namespace App\Models;

use CodeIgniter\Model;

class M_User extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'id_user';
    protected $useTimestamps = false;


    protected $allowedFields = ['id_user', 'nama','password','email','username','pekerjaan', 'wa', 'accepted', 'keperluan', 'instansi', 'medsos'];
    // protected $allowedFields = ['nama','pekerjaan', 'foto', 'audio1', 'audio2','deskripsi_eng'];


    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;
    protected $cleanValidationRules = true;

    public function getUser($id_user)
    {
        return $this->find($id_user);
    }
    public function UpdateHakAkses($id_user, $accepted)
    {
        return $this->db->table('user')
            ->where('id_user', $id_user)
            ->set('accepted', $accepted)
            ->update();
    }
    public function login($nama, $password) 
    {
        return $this->db->table('user')
            ->where([
                'nama' => $nama,
                'password' => $password,
                
            ])->get()->getRowArray();
    }

  

    
}
    
