<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Kajian extends Model
{
    protected $table = 'kajian';
    protected $primaryKey = 'id_kajian';
    protected $useTimestamps = true;


    // protected $allowedFields = ['foto', 'nama','password','email','username','level'];
    protected $allowedFields = ['judul','sampul', 'kategori','tanggal', 'created_at', 'updated_at', 'penulis'];


    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;
    protected $cleanValidationRules = true;

    public function getKajian($id_kajian)
    {
        return $this->find($id_kajian);
    }
    public function getKajianterbaru($limit = null)
    {
        // return $this->orderBy('created_at', 'DESC')
        //             ->limit($limit)
        //             ->findAll();


                    $builder = $this->db->table('berita');
                    $builder->orderBy('created_at', 'DESC');
            
                    if ($limit !== null) {
                        $builder->limit($limit);
                    }
            
                    return $builder->get()->getResultArray();
    }
    public function getDataByKategori($kategori)
    {
        return $this->db->table('kajian')
        ->where('kategori', $kategori)
        ->get()
        ->getResultArray();
    }
    

    
  

    
}
    
