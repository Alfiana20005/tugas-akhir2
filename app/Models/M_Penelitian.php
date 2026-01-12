<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Penelitian extends Model
{
    protected $table = 'penelitian';
    protected $primaryKey = 'id_penelitian';
    protected $useTimestamps = false;

    protected $allowedFields = [
        'nama',
        'no_identitas',
        'jenis',
        'judul_penelitian',
        'kategori_objek',
        'jenjang_pendidikan',
        'program_studi',
        'instansi',
        'tanggal_mulai',
        'tanggal_akhir',
        'ringkasan',
        'gambar'
    ];

    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;
    protected $cleanValidationRules = true;
}
