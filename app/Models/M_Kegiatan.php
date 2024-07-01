<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Kegiatan extends Model
{
    protected $table = 'kegiatan';
    protected $primaryKey = 'id_kegiatan';
    protected $useTimestamps = false;


    // protected $allowedFields = ['foto', 'nama','password','email','username','level'];
    protected $allowedFields = ['judul','tanggal', 'keterangan', 'foto', 'tampilkan', 'kategori_kegiatan'];


    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;
    protected $cleanValidationRules = true;

    public function get()
    {
        return $this->orderBy('tanggal', 'DESC')
                    ->findAll();
    }
    public function getKegiatan($id_kegiatan)
    {
        return $this->find($id_kegiatan);
    }
    public function getKegiatanTeratas($limit)
    {
        return $this->orderBy('tanggal', 'DESC')
                    ->limit($limit)
                    ->findAll();
    }
    public function getDataByJenis($kategori_kegiatan)
    {
        return $this->db->table('kegiatan')
        ->where('kategori_kegiatan', $kategori_kegiatan)
        ->get()
        ->getResultArray();
    }
  

    
}
    
