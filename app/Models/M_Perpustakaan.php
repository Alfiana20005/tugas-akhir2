<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Perpustakaan extends Model
{
    protected $table = 'perpustakaan';
    protected $primaryKey = 'id_buku';
    // protected $useTimestamps = true;

    protected $allowedFields = ['kode', 'judul', 'pengarang', 'penerbit', 'tempatTerbit', 'tahunTerbit', 'eksemplar', 'rak', 'kategoriBuku', 'status', 'keterangan', 'foto', 'tampilkan'];

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

    /**
     * Get paginated data with filters
     */
    public function getPaginatedWithFilters(
        int $perPage = 15,
        ?string $keyword = null,
        ?string $pengarang = null,
        ?string $penerbit = null,          // Added this parameter
        ?string $tempatTerbit = null,
        ?string $tahunTerbit = null,       // Added this parameter
        ?string $kategoriBuku = null,
        ?string $status = null
    ) {
        // Apply keyword search if provided
        if (!empty($keyword)) {
            $this->groupStart()
                ->like('judul', $keyword)
                ->orLike('kode', $keyword)
                ->orLike('pengarang', $keyword)
                ->orLike('penerbit', $keyword)
                ->groupEnd();
        }

        // Apply column filters if provided
        if (!empty($pengarang)) {
            $this->where('pengarang', $pengarang);
        }

        if (!empty($penerbit)) {           // Added this block
            $this->where('penerbit', $penerbit);
        }

        if (!empty($tempatTerbit)) {
            $this->where('tempatTerbit', $tempatTerbit);
        }

        if (!empty($tahunTerbit)) {        // Added this block
            $this->where('tahunTerbit', $tahunTerbit);
        }

        if (!empty($kategoriBuku)) {
            $this->where('kategoriBuku', $kategoriBuku);
        }

        if (!empty($status)) {
            $this->where('status', $status);
        }

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
}
