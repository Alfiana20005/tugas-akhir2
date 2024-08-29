<?php

namespace App\Models;

use CodeIgniter\Model;

class M_KoleksiLandingPage extends Model
{
    protected $table = 'koleksi';
    protected $primaryKey = 'id_koleksi';
    protected $useTimestamps = false;


    // protected $allowedFields = ['foto', 'nama','password','email','username','level'];
    protected $allowedFields = ['nama', 'no', 'ukuran', 'foto',  'deskripsi', 'kategori'];


    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;
    protected $cleanValidationRules = true;

    public function getKOleksiById($id_koleksi)
    {
        return $this->find($id_koleksi);
    }

    public function getKegiatanTeratas()
    {
        return $this->orderBy('tanggal', 'DESC')
                    ->findAll();
    }
    public function getDataByJenis($kategori_koleksi)
    {
        return $this->db->table('koleksi')
        ->where('kategori', $kategori_koleksi)
        ->get()
        ->getResultArray();
    }
    
  

    
}
    
