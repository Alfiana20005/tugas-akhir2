<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Koleksi extends Model
{
    protected $table = 'data_koleksi';
    protected $primaryKey = 'id';
    // protected $useTimestamps = true;

    protected $allowedFields = ['no_registrasi', 'no_inventaris', 'nama_inv', 'gambar', 'ukuran', 'tempat_buat', 'tempat_dapat', 'cara_dapat', 'tgl_masuk', 'keadaan', 'lokasi', 'keterangan', 'uraian', 'kode_kategori', 'id_petugas'];

    // protected $validationRules = [
    //     'no_registrasi' => 'required|max_length[6]|is_unique[data_koleksi.no_registrasi]',
    //     'no_inventaris' => 'required|max_length[11]|is_unique[data_koleksi.no_inventaris]',
    //     'nama_inv' => 'required|max_length[30]',
        
    // ];

    protected $validationMessages = [];
    protected $skipValidation = false;
    protected $cleanValidationRules = true;

    public function updateKoleksi($id, $data)
    {
        return $this->db->table($this->table)->where($this->primaryKey, $id)->update($data);
    }
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
    public function getKategoriName($kode_kategori)
    {
        return $this->db->table('data_koleksi')
            ->select('kategori_inv.nama_kategori')
            ->join('kategori_inv', 'kategori_inv.kode_kategori = data_koleksi.kode_kategori', 'left')
            ->where('data_koleksi.kode_kategori', $kode_kategori)
            ->get()
            ->getRowArray();
    }
    public function getKoleksiByKategori($kode_kategori)
    {
        return $this->db->table('data_koleksi')
            ->where('kode_kategori', $kode_kategori)
            ->get()
            ->getResultArray();
    }
    public function countKoleksi()
    {
        // Membuat instansiasi model
        $model = new M_Koleksi();

        // Menghitung jumlah petugas
        $totalKoleksi = $model->countAll();

        return $totalKoleksi;
    }
    // grafik koleksi di dashboard
    public function getDataByKategori()
    {
        $query = $this->db->query("SELECT kode_kategori, keadaan, COUNT(keadaan) as total, count(id) as jumlah FROM data_koleksi GROUP BY kode_kategori, keadaan");
    
        
        $result = $query->getResultArray();
    
        return $result;
    }
    public function koleksi(){
        $query = $this->db->query("SELECT kode_kategori, count(id) as total FROM data_koleksi GROUP BY kode_kategori" );
        $result = $query->getResultArray();
    
        return $result;
    }
    public function getKoleksiName($id_koleksi)
    {
        return $this->db->table('data_koleksi')
            ->select('nama_inv')
            ->where('id', $id_koleksi)
            ->get()
            ->getRowArray();
    }
    public function updateKeadaan($id, $keadaan)
    {
        return $this->db->table('data_koleksi')
            ->where('id', $id)
            ->set('keadaan', $keadaan)
            ->update();
    }
    
}
    
