<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Perawatan extends Model
{
    protected $table = 'data_perawatan';
    protected $primaryKey = 'id_perawatan';
    // protected $useTimestamps = true;

    protected $allowedFields = ['kode_jenisprw','deskripsi','tanggal','foto_sebelum','foto_sesudah','id_koleksi', 'id_petugas'];

    protected $validationRules = [
        'no_registrasi' => 'required|max_length[6]|is_unique[data_koleksi.no_registrasi]',
        'no_inventaris' => 'required|max_length[11]|is_unique[data_koleksi.no_inventaris]',
        'nama_inv' => 'required|max_length[30]',
        
    ];

    protected $validationMessages = [];
    protected $skipValidation = false;
    protected $cleanValidationRules = true;
    
    // public function getPerawatan($id){
    //     return $this->db->table('data_perawatan')
    //         ->where('id_koleksi', $id)
    //         ->get()
    //         ->getRowArray();
    // }

    public function getPerawatan($id)
    {
        $result = $this->db->table('data_perawatan')
            ->where('id_koleksi', $id)
            ->get()
            ->getResultArray();

        // Check if there's any data
        if (empty($result)) {
            return null; // Or you can return an empty array depending on your preference
        }

        return $result;
    }
    public function getPetugasName($id_petugas)
    {
        return $this->db->table('petugas')
            ->select('nama')
            ->where('id_petugas', $id_petugas)
            ->get()
            ->getRowArray();
    }
    public function savePerawatan($data)
    {
        $query = $this->db->table($this->table)
            ->insert($data);

        return $query;
    }
    
    
}
    
