<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Koleksi extends Model
{
    protected $table = 'data_koleksi';
    protected $primaryKey = 'id';
    // protected $useTimestamps = true;

    protected $allowedFields = ['no_registrasi', 'no_inventaris', 'nama_inv', 'gambar', 'ukuran', 'tempat_buat', 'tempat_dapat', 'cara_dapat', 'tgl_masuk', 'keadaan', 'lokasi', 'keterangan', 'uraian', 'kode_kategori', 'id_petugas'];

    protected $validationRules = [
        'no_registrasi' => 'required|max_length[6]|is_unique[data_koleksi.no_registrasi]',
        'no_inventaris' => 'required|max_length[11]|is_unique[data_koleksi.no_inventaris]',
        'nama_inv' => 'required|max_length[30]',
        // Sesuaikan aturan validasi dengan kebutuhan Anda
    ];

    protected $validationMessages = [];
    protected $skipValidation = false;
    protected $cleanValidationRules = true;
    public function getKoleksi($id){
        return $this->find($id);
    }
    public function getPetugasName($id_petugas)
    {
        return $this->db->table('petugas')
            ->select('nama')
            ->where('id_petugas', $id_petugas)
            ->get()
            ->getRowArray();
    }
}
    
