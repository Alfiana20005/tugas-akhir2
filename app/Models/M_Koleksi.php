<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Koleksi extends Model
{
    protected $table = 'data_koleksi';
    protected $primaryKey = 'id';
    // protected $useTimestamps = true;

    protected $allowedFields = ['kode_lk','fotografer','urutan','zona','rak', 'lemari', 'harga', 'no_registrasi', 'no_inventaris', 'nama_inv','inv_name', 'gambar', 'ukuran', 'tempat_buat', 'tempat_dapat', 'cara_dapat', 'tgl_masuk', 'keadaan', 'lokasi', 'keterangan', 'uraian', 'kode_kategori', 'id_petugas', 'usia','harga_wajar', 'harga_penggantian','sumber','status'];


    protected $validationMessages = [];
    protected $skipValidation = false;
    protected $cleanValidationRules = true;

    public function getkoleksiAll() {
        return $this->orderBy('CAST(no_registrasi AS UNSIGNED)', 'ASC')
                    ->findAll();
    }
    public function getPerawatanKoleksi($no_registrasi)
    {
        $result = $this->db->table('data_perawatan2')
            ->where('no_registrasi', $no_registrasi)
            ->get()
            ->getResultArray();

       
        if (empty($result)) {
            return null; // Or you can return an empty array depending on your preference
        }

        return $result;
    }

    public function updateKoleksi($id, $data)
    {
        return $this->db->table($this->table)->where($this->primaryKey, $id)->update($data);
    }
    public function getKoleksi2($no_registrasi){
        return $this->find($no_registrasi);
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
            ->orderBy("CAST(no_registrasi AS UNSIGNED)", 'ASC')
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
    public function countStatus($status)
    {
        // Membuat instansiasi model
        $model = new M_Koleksi();

        // Menghitung jumlah petugas
        $totalKoleksi = $model->where('status', $status)->countAllResults();

        return $totalKoleksi;
    }
    public function getPaginated($num, $keyword=null) {
        $builder = $this->table('data_koleksi');
    
        // Pilih semua kolom dari tabel
        $builder->select('*');
        $builder->orderBy("CAST(no_registrasi AS UNSIGNED)", 'ASC');
    
        
        // Jika ada pencarian, tambahkan kondisi 'like'
        if ($keyword) {
            $builder->like('no_registrasi', $keyword); // Ganti dengan kolom yang sesuai jika perlu
            $builder->orlike('no_inventaris', $keyword);    
            $builder->orlike('nama_inv', $keyword);    
            $builder->orlike('keadaan', $keyword);    
            $builder->orlike('status', $keyword);    
            $builder->orlike('kode_lk', $keyword);       
            $builder->orlike('lemari', $keyword);       
            $builder->orlike('rak', $keyword);       
            $builder->orlike('zona', $keyword);       
        }

        // Kembalikan data paginated dan pager
    return $builder->paginate($num);

    }
    
}
    
