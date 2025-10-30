<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Sega extends Model
{
    protected $table = 'sega';
    protected $primaryKey = 'id_sega';
    protected $useTimestamps = false;
    protected $allowedFields = ['judul', 'deskripsi_indo', 'deskripsi_eng', 'foto', 'audio_id', 'audio_eng'];
    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;
    protected $cleanValidationRules = true;

    public function getsega($id_sega)
    {
        return $this->find($id_sega);
    }
}
