<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Perpustakaan extends Model
{
    protected $table = 'perpustakaan';
    protected $primaryKey = 'id_buku';
    // protected $useTimestamps = true;

    protected $allowedFields = ['kode', 'judul', 'pengarang', 'penerbit', 'tempatTerbit', 'tahunTerbit', 'eksemplar', 'rak', 'kategoriBuku', 'status', 'keterangan', 'foto', 'tampilkan' ];



    protected $validationMessages = [];
    protected $skipValidation = false;
    protected $cleanValidationRules = true;


    public function getBuku($id_buku){
        return $this->find($id_buku);
    }

    public function getPaginated($num, $keyword=null) {
        $builder = $this->table('perpustakaan');
    
        // Pilih semua kolom dari tabel
        $builder->select('*');
        
        // Jika ada pencarian, tambahkan kondisi 'like'
        if ($keyword) {
            $builder->like('judul', $keyword); // Ganti dengan kolom yang sesuai jika perlu
            $builder->orlike('kode', $keyword);    
            $builder->orlike('pengarang', $keyword);    
            $builder->orlike('penerbit', $keyword);    
            $builder->orlike('tempatTerbit', $keyword);    
            $builder->orlike('tahunTerbit', $keyword);    
            $builder->orlike('eksemplar', $keyword);    
            $builder->orlike('rak', $keyword);    
            $builder->orlike('kategoriBuku', $keyword);    
            $builder->orlike('status', $keyword);    
            $builder->orlike('keterangan', $keyword);    
        }
        
        // Kembalikan data paginated dan pager
    return $builder->paginate($num);

    }
    public function getBukuRekomendasi($tampilkan){
        return $this->where('tampilkan', $tampilkan)->findAll();
        
    }
    public function countBuku()
    {
        // Membuat instansiasi model
        $model = new M_Perpustakaan();

        // Menghitung jumlah petugas
        $totalBuku = $model->countAll();

        return $totalBuku;
    }

   
    
}
    
