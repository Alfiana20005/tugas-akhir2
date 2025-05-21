<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Perpustakaan extends Model
{
    protected $table = 'perpustakaan';
    protected $primaryKey = 'id_buku';
    // protected $useTimestamps = true;

    protected $allowedFields = ['kode', 'judul', 'pengarang', 'penerbit', 'tempatTerbit', 'tahunTerbit', 'eksemplar', 'nomorSeri', 'rak', 'kategoriBuku', 'status', 'keterangan', 'foto', 'tampilkan'];

    protected $validationMessages = [];
    protected $skipValidation = false;
    protected $cleanValidationRules = true;

    public function getBuku($id_buku)
    {
        return $this->find($id_buku);
    }

    public function getPaginated($num, $keyword = null)
    {
        // Jika ada pencarian, tambahkan kondisi 'like'
        if ($keyword) {
            $this->groupStart()
                ->like('judul', $keyword)
                ->orLike('kode', $keyword)
                ->orLike('pengarang', $keyword)
                ->orLike('penerbit', $keyword)
                ->orLike('tempatTerbit', $keyword)
                ->orLike('tahunTerbit', $keyword)
                ->orLike('eksemplar', $keyword)
                ->orLike('rak', $keyword)
                ->orLike('kategoriBuku', $keyword)
                ->orLike('status', $keyword)
                ->orLike('keterangan', $keyword)
                ->groupEnd();
        }

        // Kembalikan data paginated dan pager
        return $this->paginate($num);
    }

    public function getBukuRekomendasi($tampilkan)
    {
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

    public function sumEksemplar()
    {
        return $this->db->table('perpustakaan')->selectSum('eksemplar')->get()->getRow()->eksemplar ?? 0;
    }

    public function countByCategory()
    {
        $query = $this->db->table('perpustakaan')
            ->select('kategoriBuku, COUNT(*) as total')
            ->groupBy('kategoriBuku')
            ->get();

        $result = [];
        foreach ($query->getResult() as $row) {
            $result[$row->kategoriBuku] = $row->total;
        }

        return $result;
    }

    /**
     * Get paginated data with filters
     */
    public function getAllWithFilters($keyword = null, $pengarang = null, $penerbit = null, $tempatTerbit = null, $tahunTerbit = null, $kategoriBuku = null, $status = null)
    {
        $builder = $this->builder();

        // Apply keyword filter (search across multiple columns)
        if (!empty($keyword)) {
            $builder->groupStart()
                ->like('judul', "%$keyword%")
                ->orLike('pengarang', "%$keyword%")
                ->orLike('penerbit', "%$keyword%")
                ->orLike('kategoriBuku', "%$keyword%")
                ->groupEnd();
        }

        // Apply specific filters
        if (!empty($pengarang)) {
            $builder->where('pengarang', $pengarang);
        }

        if (!empty($penerbit)) {
            $builder->where('penerbit', $penerbit);
        }

        if (!empty($tempatTerbit)) {
            $builder->where('tempatTerbit', $tempatTerbit);
        }

        if (!empty($tahunTerbit)) {
            $builder->where('tahunTerbit', $tahunTerbit);
        }

        if (!empty($kategoriBuku)) {
            $builder->where('kategoriBuku', $kategoriBuku);
        }

        if (!empty($status)) {
            $builder->where('status', $status);
        }

        // Get all results without pagination
        return $builder->get()->getResultArray();
    }

    /**
     * Get unique values for a specific column
     */
    public function getUniqueValues(string $column)
    {
        // Using the db object directly for this specific query
        $db = \Config\Database::connect();
        $builder = $db->table($this->table);

        return $builder->select($column)
            ->distinct()
            ->where("$column !=", '')
            ->orderBy($column, 'ASC')
            ->get()
            ->getResultArray();
    }

    public function isJudulExists($judul)
    {
        return $this->where('judul', $judul)->countAllResults() > 0;
    }
}
