<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Sega extends Model
{
    protected $table = 'sega';
    protected $primaryKey = 'id_sega';
    protected $useTimestamps = false;
    protected $allowedFields = ['judul', 'slug', 'deskripsi_indo', 'deskripsi_eng', 'foto', 'audio_id', 'audio_eng'];
    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;
    protected $cleanValidationRules = true;

    public function getsega($slug)
    {
        // ✅ Cari berdasarkan slug
        return $this->where('slug', $slug)->first();
    }

    public function getSegaById($id_sega)
    {
        return $this->find($id_sega);
    }
}
