<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Gallery extends Model
{
    protected $table = 'gallery';
    protected $primaryKey = 'id_gallery';
    protected $useTimestamps = false;



    protected $allowedFields = ['judul', 'foto', 'deskripsi'];


    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;
    protected $cleanValidationRules = true;

    public function getGallery($id_gallery)
    {
        return $this->find($id_gallery);
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
