<?php

namespace App\Models;

use CodeIgniter\Model;

class M_IsiKajian extends Model
{
    protected $table = 'data_kajian';
    protected $primaryKey = 'id_dataKajian';
    protected $useTimestamps = false;


    // protected $allowedFields = ['foto', 'nama','password','email','username','level'];
    protected $allowedFields = ['narasi','id_kajian', 'foto'];


    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;
    protected $cleanValidationRules = true;

    public function getIsiKajian($id_dataKajian)
    {
        return $this->find($id_dataKajian);
    }
    public function getDataByIdKajian($id_kajian)
    {
        return $this->where('id_kajian', $id_kajian)
                    ->orderBy('id_dataKajian', 'DESC')
                    ->findAll();
    }
    public function getBeritaTerbaru($limit)
    {
        return $this->orderBy('tanggal', 'DESC')
                    ->limit($limit)
                    ->findAll();
    }
  

    
}
    
