<?php

namespace App\Models;

use CodeIgniter\Model;

class M_JadwalPrw extends Model
{
    protected $table = 'jadwal_prw';
    protected $primaryKey = 'id';
    // protected $useTimestamps = true;

    protected $allowedFields = ['deskripsi','target','mulai','berakhir','status','kode_jenisprw', 'id_petugas'];

    protected $validationRules = [
        'no_registrasi' => 'required|max_length[6]|is_unique[data_koleksi.no_registrasi]',
        'no_inventaris' => 'required|max_length[11]|is_unique[data_koleksi.no_inventaris]',
        'nama_inv' => 'required|max_length[30]',
        
    ];

    protected $validationMessages = [];
    protected $skipValidation = false;
    protected $cleanValidationRules = true;


    public function saveJadwal($data)
    {
        $query = $this->db->table($this->table)
            ->insert($data);

        return $query;
    }
    public function getJadwalPrw(){
        return $this->findAll();

    }
    public function getJenisPrwName($kode_jenisprw)
    {
        return $this->db->table('jadwal_prw')
            ->select('jenis_perawatan.jenis_prw')
            ->join('jenis_perawatan', 'jenis_perawatan.kode_jenisprw = jadwal_prw.kode_jenisprw', 'left')
            ->where('jadwal_prw.kode_jenisprw', $kode_jenisprw)
            ->get()
            ->getResultArray();
    }
    
  
    // public function getPerawatanFromJadwal($mulai, $berakhir, $kode_jenisprw)
    // {
    //     return $this->db->table('data_perawatan2')
    //         ->select('data_perawatan2.*, jenis_perawatan.jenis_prw' )
    //         ->join('jenis_perawatan', 'jenis_perawatan.kode_jenisprw = data_perawatan2.kode_jenisprw', 'left')
    //         ->where('tanggal_sebelum >=', $mulai)
    //         ->where('tanggal_sesudah <=', $berakhir)
    //         ->where('data_perawatan2.kode_jenisprw', $kode_jenisprw)
    //         ->get()
    //         ->getResultArray();
    // }

        public function getPerawatanFromJadwal($mulai, $berakhir, $kode_jenisprw)
    {
        return $this->db->table('data_perawatan2')
            ->select('data_perawatan2.*, jenis_perawatan.jenis_prw' )
            ->join('jenis_perawatan', 'jenis_perawatan.kode_jenisprw = data_perawatan2.kode_jenisprw', 'left')
            ->where('tanggal_sebelum >=', $mulai)
            ->where('tanggal_sesudah <=', $berakhir)
            ->where('data_perawatan2.kode_jenisprw', $kode_jenisprw)
            ->get()
            ->getResultArray();
    }
    

    public function updateStatus($data)
    {
        return $this->db->table('jadwal_prw')
            ->where('id', $data['id'])
            ->update(['status' => $data['status']]);
    }
    
    public function countPerawatanInRange($mulai, $berakhir, $kode_jenisprw)
    {
        return $this->db->table('data_perawatan2')
            ->where('tanggal_sebelum >=', $mulai)
            ->where('tanggal_sesudah <=', $berakhir)
            ->where('status =', 'Selesai')
            ->where('kode_jenisprw', $kode_jenisprw)
            ->countAllResults();
    }
    
}
    
