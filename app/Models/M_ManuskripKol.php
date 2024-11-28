<?php

namespace App\Models;

use CodeIgniter\Model;

class M_ManuskripKol extends Model
{
    protected $table = 'manuskrip_koleksi';
    protected $primaryKey = 'id';
    protected $useTimestamps = false;


    // protected $allowedFields = ['foto', 'nama','password','email','username','level'];
    protected $allowedFields = ['nama', 'foto', 'link','created_at','updated_at', 'views'];


    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;
    protected $cleanValidationRules = true;

    public function getManuskrip($id)
    {
        return $this->find($id);
    }
    public function getManuskripKolTerbaru($limit = null)
    {
        return $this->orderBy('id', 'DESC')
                    ->findAll($limit);
    }
    
  

    
}
    
