<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Berita extends Model
{
    protected $table = 'berita';
    protected $primaryKey = 'id_berita';
    protected $useTimestamps = false;


    // protected $allowedFields = ['foto', 'nama','password','email','username','level'];
    protected $allowedFields = ['judul','tanggal', 'type','isi', 'foto', 'penulis', 'kategoriBerita'];


    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;
    protected $cleanValidationRules = true;

    public function getBeritaBaru()
    {
        return $this->orderBy('tanggal', 'DESC')
                    ->findAll();
    }
    public function getBerita($id_berita)
    {
        return $this->find($id_berita);
    }
    public function getDataByLevel($level)
    {
        return $this->where('level', $level)->findAll();
    }
    public function getBeritaTerbaru($limit)
    {
        return $this->orderBy('tanggal', 'DESC')
                    ->limit($limit)
                    ->findAll();
    }
    // public function getBeritaByKategori($kategoriBerita, $limit) {
    //     return $this->where('kategoriBerita', $kategoriBerita)
    //                 ->limit($limit)
    //                 ->findAll();
    // }

    public function getBeritaByKategori($kategoriBerita, $limit = null)
{
    $builder = $this->db->table('berita');
    $builder->where('kategoriBerita', $kategoriBerita);

    if ($limit !== null) {
        $builder->limit($limit);
    }

    return $builder->get()->getResultArray();
}
    public function getBeritaByKategoriAll($kategoriBerita) {
        return $this->where('kategoriBerita', $kategoriBerita)
                    ->findAll();
    }
  

    
}
    
