<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Perpustakaan extends Model
{
    protected $table = 'perpustakaan';
    protected $primaryKey = 'id_buku';
    // protected $useTimestamps = true;

    protected $allowedFields = ['kode', 'judul', 'pengarang', 'penerbit', 'tempatTerbit', 'tahunTerbit', 'eksemplar', 'rak', 'kategoriBuku', 'status', 'keterangan', 'foto', 'tampilkan' ];



    protected $validationMessages = [];
    protected $skipValidation = false;
    protected $cleanValidationRules = true;


    public function getBuku($id_buku){
        return $this->find($id_buku);
    }
    public function getBukuRekomendasi($tampilkan){
        return $this->where('tampilkan', $tampilkan)->findAll();
        
    }

   
    
}
    
