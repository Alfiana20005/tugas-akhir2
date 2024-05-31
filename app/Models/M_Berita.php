<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Berita extends Model
{
    protected $table = 'berita';
    protected $primaryKey = 'id_berita';
    protected $useTimestamps = false;


    // protected $allowedFields = ['foto', 'nama','password','email','username','level'];
    protected $allowedFields = ['judul','tanggal', 'type','isi', 'foto', 'penulis'];


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
  

    
}
    
