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
    public function getAllWithFilters(
        $keyword = null,
        $pengarang = null,
        $penerbit = null,
        $tempatTerbit = null,
        $tahunTerbit = null,
        $kategoriBuku = null,
        $status = null,
        $filter = null,
        $perPage = 15
    ) {
        // Apply filters using the model's query builder
        if (!empty($keyword)) {
            $this->groupStart()
                ->like('judul', $keyword)
                ->orLike('pengarang', $keyword)
                ->orLike('kode', $keyword)
                ->groupEnd();
        }

        if (!empty($pengarang)) {
            $this->where('pengarang', $pengarang);
        }

        if (!empty($penerbit)) {
            $this->where('penerbit', $penerbit);
        }

        if (!empty($tempatTerbit)) {
            $this->where('tempatTerbit', $tempatTerbit);
        }

        if (!empty($tahunTerbit)) {
            $this->where('tahunTerbit', $tahunTerbit);
        }

        if (!empty($kategoriBuku)) {
            $this->where('kategoriBuku', $kategoriBuku);
        }

        if (!empty($status)) {
            $this->where('status', $status);
        }

        // Filter untuk data tanpa sampul
        if ($filter === 'no_image') {
            $this->where('foto', 'default.jpg');
        }

        // Order by untuk konsistensi
        $this->orderBy('id_buku', 'DESC');

        // Return paginated results
        return $this->paginate($perPage);
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
