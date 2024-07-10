<?php

namespace App\Models;

use CodeIgniter\Model;

class M_TerakhirDiubah extends Model
{
    protected $table = 'inv_lastupdate';
    protected $primaryKey = 'id';
    protected $useTimestamps = false;


    // protected $allowedFields = ['foto', 'nama','password','email','username','level'];
    protected $allowedFields = ['rak', 'lemari', 'harga', 'no_registrasi', 'no_inventaris', 'nama_inv', 'gambar', 'ukuran', 'tempat_buat', 'tempat_dapat', 'cara_dapat', 'tgl_masuk', 'keadaan', 'lokasi', 'keterangan', 'uraian', 'kode_kategori', 'id_petugas'];


    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;
    protected $cleanValidationRules = true;

    public function getData($id)
    {
        return $this->find($id);
    }

    
}
    
