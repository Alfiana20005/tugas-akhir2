<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Perawatan2 extends Model
{
    protected $table = 'data_perawatan2';
    protected $primaryKey = 'id_perawatan2';
    // protected $useTimestamps = true;

    protected $allowedFields = ['kode_kategori', 'penanggung_jawab', 'no_registrasi', 'nama_inv', 'kode_jenisprw', 'deskripsi', 'tanggal_sebelum', 'tanggal_sesudah', 'foto_sebelum', 'foto_setelah', 'status', 'rak', 'lokasi', 'lemari', 'id_petugas'];


    protected $validationMessages = [];
    protected $skipValidation = false;
    protected $cleanValidationRules = true;

    // public function getPerawatan($id){
    //     return $this->db->table('data_perawatan')
    //         ->where('id_koleksi', $id)
    //         ->get()
    //         ->getRowArray();
    // }

    public function getPerawatanKoleksi($no_registrasi)
    {
        $result = $this->db->table('data_perawatan2')
            ->where('no_registrasi', $no_registrasi)
            ->get()
            ->getResultArray();

        // Check if there's any data
        if (empty($result)) {
            return null; // Or you can return an empty array depending on your preference
        }

        return $result;
    }
    public function getKoleksi2($no_registrasi)
    {
        return $this->db->table('koleksi')
            ->where('no_registrasi', $no_registrasi)
            ->get();
    }

    public function getPerawatan2($id_perawatan2)
    {
        return $this->find($id_perawatan2);
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
    public function getJenisName($kode_jenisprw)
    {
        return $this->db->table('jenis_perawatan')
            ->select('jenis_prw')
            ->where('kode_jenisprw', $kode_jenisprw)
            ->get()
            ->getRowArray();
    }
    public function getJenisPrwName($kode_jenisprw)
    {
        return $this->db->table('data_perawatan2')
            ->select('jenis_perawatan.jenis_prw')
            ->join('jenis_perawatan', 'jenis_perawatan.kode_jenisprw = data_perawatan2.kode_jenisprw', 'left')
            ->where('data_perawatan2.kode_jenisprw', $kode_jenisprw)
            ->get()
            ->getRowArray();
    }
    public function getKoleksiName($no_registrasi)
    {
        return $this->db->table('data_perawatan2')
            ->select('data_koleksi.nama_inv', 'data_koleksi.nama_inv')
            ->join('data_koleksi', 'data_koleksi.no_registrasi = data_perawatan2.no_registrasi', 'left')
            ->where('data_perawatan2.no_registrasi', $no_registrasi)
            ->get()
            ->getResultArray();
    }
    public function getPerawatanInRange($mulai, $berakhir, $kode_jenisprw)
    {
        return $this->db->table('data_perawatan2')
            ->select('data_perawatan2.*, jenis_perawatan.jenis_prw')
            ->join('jenis_perawatan', 'jenis_perawatan.kode_jenisprw = data_perawatan2.kode_jenisprw', 'left')
            ->where('tanggal >=', $mulai)
            ->where('tanggal <=', $berakhir)
            ->where('data_perawatan2.kode_jenisprw', $kode_jenisprw)
            ->get()
            ->getResultArray();
    }
    // public function getPerawatanInRange2($mulai, $berakhir)
    // {
    //     return $this->db->table('data_perawatan')
    //         ->select('data_perawatan.*, jenis_perawatan.jenis_prw')
    //         ->join('jenis_perawatan', 'jenis_perawatan.kode_jenisprw = data_perawatan.kode_jenisprw', 'left')
    //         ->where('tanggal >=', $mulai)
    //         ->where('tanggal <=', $berakhir)            
    //         ->get()
    //         ->getResultArray();
    // }

    public function getPreventif()
    {

        return $this->where('kode_jenisPrw', '01')->findAll();
    }
    public function getKuratif()
    {

        return $this->where('kode_jenisPrw', '02')->findAll();
    }
    public function getRestorasi()
    {

        return $this->where('kode_jenisPrw', '03')->findAll();
    }
    public function getKoleksiByNoRegistrasi($noRegistrasi)
    {
        return $this->where('no_registrasi', $noRegistrasi)->first();
    }


    public function getPerawatanInRange2($mulai, $berakhir, $kode_kategori, $kode_jenisprw)
    {
        return $this->db->table('data_perawatan2')
            ->select('data_perawatan2.*, data_koleksi.kode_kategori, jadwal_prw.kode_jenisprw')
            ->join('data_koleksi', 'data_koleksi.no_registrasi = data_perawatan2.no_registrasi', 'left')
            ->join('jadwal_prw', 'jadwal_prw.kode_jenisprw = data_perawatan2.kode_jenisprw', 'left') // Join dengan tabel jadwal_prw
            ->where('tanggal_sebelum >=', $mulai)
            ->where('tanggal_sesudah <=', $berakhir)
            ->where('data_koleksi.kode_kategori', $kode_kategori)
            ->where('jadwal_prw.kode_jenisprw', $kode_jenisprw)
            ->get()
            ->getResultArray();
    }

    public function getDataByYear($tahun)
    {
        $query = $this->db->query("SELECT MONTH(tanggal_sebelum) as bulan, kode_jenisprw, count(id_perawatan2) as total FROM data_perawatan2 WHERE YEAR(tanggal_sebelum) = ? GROUP BY bulan, kode_jenisprw", [$tahun]);

        // Ambil hasil query sebagai array
        $result = $query->getResultArray();

        // Konversi nomor bulan menjadi nama bulan
        foreach ($result as &$row) {
            if (isset($row['bulan'])) {
                $row['bulan'] = date("F", mktime(0, 0, 0, $row['bulan'], 1));
            }
        }

        return $result;
    }

    public function getDataByMonth($tahun)
    {
        $query = $this->db->query("SELECT MONTH(tanggal_sebelum) as bulan, count(id_perawatan2) as total FROM data_perawatan2 WHERE YEAR(tanggal_sebelum) = ? GROUP BY bulan", [$tahun]);

        // Ambil hasil query sebagai array
        $result = $query->getResultArray();

        // Konversi nomor bulan menjadi nama bulan
        foreach ($result as &$row) {
            $row['bulan'] = date("F", mktime(0, 0, 0, $row['bulan'], 1));
        }

        return $result;
    }

    public function totalPerawatan()
    {
        $query = $this->db->table('data_perawatan2')
            ->select('
                SUM(CASE WHEN kode_jenisprw = 1 THEN 1 ELSE 0 END) as preventif,
                SUM(CASE WHEN kode_jenisprw = 2 THEN 1 ELSE 0 END) as kuratif,
                SUM(CASE WHEN kode_jenisprw = 3 THEN 1 ELSE 0 END) as restorasi,
                COUNT(id_perawatan2) as total
            ')
            ->get();

        $result = $query->getRow();

        // Return the counts as object properties
        return [
            'preventif' => $result ? (int)$result->preventif : 0,
            'kuratif' => $result ? (int)$result->kuratif : 0,
            'restorasi' => $result ? (int)$result->restorasi : 0,
            'total' => $result ? (int)$result->total : 0
        ];
    }

    public function getAvailableYears()
    {
        $query = $this->db->query("SELECT DISTINCT YEAR(tanggal_sebelum) as year FROM data_perawatan2 ORDER BY year DESC");
        $result = $query->getResultArray();

        // Extract only the year values
        $years = array_column($result, 'year');

        // Make sure current year is included even if no data exists yet
        $currentYear = date('Y');
        if (!in_array($currentYear, $years)) {
            $years[] = $currentYear;
            sort($years);
            $years = array_reverse($years); // Keep descending order
        }

        return $years;
    }
}
