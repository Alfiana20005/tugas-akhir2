<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Penelitian extends Model
{
    protected $table = 'penelitian';
    protected $primaryKey = 'id_penelitian';
    protected $useTimestamps = false;


    protected $allowedFields = ['nama', 'nim', 'instansi', 'judul_penelitian', 'tanggal_penelitian',  'foto_penelitian'];


    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;
    protected $cleanValidationRules = true;
}
