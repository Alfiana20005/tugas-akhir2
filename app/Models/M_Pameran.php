<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Pameran extends Model
{
    protected $table = 'pameran';
    protected $primaryKey = 'id_pameran';
    protected $useTimestamps = false;
    protected $returnType = 'array';

    protected $allowedFields = [
        'judul',
        'keterangan',
        'kode_koleksi',
        'asal_dibuat',
        'asal_perolehan',
        'periode',
        'description',
        'image',
        'jenis',
        'highlight'
    ];

    // Nonaktifkan semua validation
    protected $skipValidation = true;
}
