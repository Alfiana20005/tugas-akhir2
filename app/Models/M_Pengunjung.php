<?php

namespace App\Models;

use CodeIgniter\Model;


class M_Pengunjung extends Model
{
    protected $table = 'data_pengunjung';
    protected $primaryKey = 'id_pengunjung';
    protected $useTimestamps = true;


    protected $allowedFields = ['nama', 'alamat','no_hp','kategori','jumlah','id_petugas'];

    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;
    protected $cleanValidationRules = true;

    public function getPengunjung($id_pengunjung)
    {
        return $this->find($id_pengunjung);
    }
    public function getDataByKategori($kategori)
    {
        return $this->where('kategori', $kategori)->findAll();
    }
    public function getPetugasName($id_petugas)
    {
        return $this->db->table('petugas')
            ->select('nama')
            ->where('id_petugas', $id_petugas)
            ->get()
            ->getRowArray();
    } 
    public function getDataByDateRange($tanggalAwal, $tanggalAkhir)
    {
        return $this->where('created_at >=', $tanggalAwal)
                    ->where('created_at <=', $tanggalAkhir)
                    ->findAll();
    }


    public function getStatistikData($tahun)
    {
        $formattedTahun = date('Y', strtotime($tahun));

        return $this->db->table('data_pengunjung')
            ->select('DATE_FORMAT(created_at, "%Y-%m-%d") AS tanggal, kategori, SUM(jumlah) AS jumlah')
            ->like('created_at', $formattedTahun, 'after')
            ->groupBy('tanggal, kategori')
            ->get()
            ->getResultArray();
    }    
    public function getDataStatistik($tahun)
    {
        // Query untuk mengambil data pengunjung pertahun
        $sql = "SELECT YEAR(created_at) AS tahun, MONTHNAME(created_at) AS bulan, kategori, sum(jumlah) AS jumlah FROM data_pengunjung WHERE created_at LIKE '$tahun%' GROUP BY YEAR(created_at), MONTH(created_at), kategori";

        // Menjalankan query
        $result = $this->db->query($sql)->getResultArray();

        // ... (proses data sesuai kebutuhan Anda)

        return $result;
    }
    public function countPengunjung() {
        $model = new M_Pengunjung();

        // Menghitung jumlah petugas
        return $this->selectSum('jumlah')->get()->getRowArray()['jumlah'];
    }
    public function countPengunjungToday() {
        $currentToday= date('Y-m-d');
    
        return $this->selectSum('jumlah')->where('DATE_FORMAT(created_at, "%Y-%m-%d")', $currentToday)->get()->getRowArray()['jumlah'];
    }
    public function countPengunjungThisMonth()
    {
        $currentMonth = date('Y-m');
    
        return $this->selectSum('jumlah')->where('DATE_FORMAT(created_at, "%Y-%m")', $currentMonth)->get()->getRowArray()['jumlah'];
    }
    
    public function countPengunjungThisYear()
    {
        $currentYear = date('Y');
    
        return $this->selectSum('jumlah')->where('YEAR(created_at)', $currentYear)->get()->getRowArray()['jumlah'];
    }
    
    
    


  

    
}
    
