<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Perpustakaan extends Model
{
    protected $table = 'perpustakaan';
    protected $primaryKey = 'id_buku';
    // protected $useTimestamps = true;

    protected $allowedFields = [
        'kode',
        'judul',
        'pengarang',
        'jenisPengarang',
        'penerbit',
        'tempatTerbit',
        'tahunTerbit',
        'jenisBuku',
        'bahasa',
        'eksemplar',
        'kodeEksemplar',
        'isbn',
        'nomorSeri',
        'keadaan',
        'rak',
        'kategoriBuku',
        'status',
        'subjek',
        'keterangan',
        'tampilkan',
        'foto'
    ];

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

    /**
     * Get total eksemplar from grouped data (alternative method)
     */
    public function sumEksemplarGrouped()
    {
        $builder = $this->db->table($this->table);
        $builder->select('SUM(eksemplar) as total_eksemplar');
        $result = $builder->get()->getRow();
        return $result ? $result->total_eksemplar : 0;
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

        // Order by untuk konsistensi - urutkan dari yang paling akhir ditambahkan
        $this->orderBy('id_buku', 'DESC');

        // Return paginated results
        return $this->paginate($perPage);
    }

    /**
     * Get paginated data with filters and grouped by title (NEW METHOD)
     */
    public function getAllWithFiltersGrouped(
        $keyword = null,
        $pengarang = null,
        $penerbit = null,
        $tempatTerbit = null,
        $tahunTerbit = null,
        $jenisBuku = null,
        $kategoriBuku = null,
        $status = null,
        $keadaan = null,
        $bahasa = null,
        $rak = null,
        $tampilkan = null,
        $filter = null,
        $perPage = 15,
        $page = 1
    ) {
        // First, build the base query
        $builder = $this->db->table($this->table);

        // Select fields with COUNT as jumlah_eksemplar dan GROUP_CONCAT untuk multiple kode eksemplar
        $builder->select('
            MIN(id_buku) as id_buku,
            MIN(kode) as kode,
            GROUP_CONCAT(DISTINCT kodeEksemplar ORDER BY kodeEksemplar SEPARATOR ", ") as kodeEksemplar,
            MIN(foto) as foto,
            judul,
            MIN(pengarang) as pengarang,
            MIN(jenisPengarang) as jenisPengarang,
            MIN(penerbit) as penerbit,
            MIN(tempatTerbit) as tempatTerbit,
            MIN(tahunTerbit) as tahunTerbit,
            MIN(jenisBuku) as jenisBuku,
            MIN(kategoriBuku) as kategoriBuku,
            MIN(bahasa) as bahasa,
            MIN(rak) as rak,
            MIN(isbn) as isbn,
            MIN(subjek) as subjek,
            MIN(status) as status,
            MIN(keadaan) as keadaan,
            MIN(eksemplar) as eksemplar,
            MIN(nomorSeri) as nomorSeri,
            MIN(keterangan) as keterangan,
            MIN(tampilkan) as tampilkan,
            COUNT(*) as jumlah_eksemplar,
            SUM(eksemplar) as total_eksemplar,
            GROUP_CONCAT(DISTINCT id_buku ORDER BY id_buku SEPARATOR ",") as all_ids
        ');

        // Apply filters
        if (!empty($keyword)) {
            $builder->groupStart()
                ->like('judul', $keyword)
                ->orLike('pengarang', $keyword)
                ->orLike('penerbit', $keyword)
                ->orLike('subjek', $keyword)
                ->orLike('isbn', $keyword)
                ->groupEnd();
        }

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

        if (!empty($jenisBuku)) {
            $builder->where('jenisBuku', $jenisBuku);
        }

        if (!empty($kategoriBuku)) {
            $builder->where('kategoriBuku', $kategoriBuku);
        }

        if (!empty($status)) {
            $builder->where('status', $status);
        }

        if (!empty($keadaan)) {
            $builder->where('keadaan', $keadaan);
        }

        if (!empty($bahasa)) {
            $builder->where('bahasa', $bahasa);
        }

        if (!empty($rak)) {
            $builder->where('rak', $rak);
        }

        // Filter untuk buku tanpa gambar
        if ($filter === 'no_image') {
            $builder->groupStart()
                ->where('foto', '')
                ->orWhere('foto', 'no_cover.jpeg')
                ->orWhere('foto', 'default.jpg')
                ->orWhere('foto', null)
                ->groupEnd();
        }

        // Group by judul untuk menggabungkan buku dengan judul sama
        $builder->groupBy(['judul', 'pengarang', 'penerbit']);

        // Order by
        if (!empty($tampilkan)) {
            switch ($tampilkan) {
                case 'terbaru':
                    $builder->orderBy('MIN(tahunTerbit)', 'DESC');
                    break;
                case 'terlama':
                    $builder->orderBy('MIN(tahunTerbit)', 'ASC');
                    break;
                case 'a-z':
                    $builder->orderBy('judul', 'ASC');
                    break;
                case 'z-a':
                    $builder->orderBy('judul', 'DESC');
                    break;
                default:
                    // Default: urutkan berdasarkan ID terbesar (paling akhir ditambahkan)
                    $builder->orderBy('MAX(id_buku)', 'DESC');
            }
        } else {
            // Default: urutkan berdasarkan ID terbesar (paling akhir ditambahkan)
            $builder->orderBy('MAX(id_buku)', 'DESC');
        }

        // Manual pagination
        $offset = ($page - 1) * $perPage;
        $builder->limit($perPage, $offset);

        // Get the results
        $results = $builder->get()->getResultArray();

        // Create pager manually for grouped data
        $this->pager = \Config\Services::pager();

        // Get total count for pagination
        $totalCount = $this->getGroupedBooksCount(
            $keyword,
            $pengarang,
            $penerbit,
            $tempatTerbit,
            $tahunTerbit,
            $jenisBuku,
            $kategoriBuku,
            $status,
            $keadaan,
            $bahasa,
            $rak,
            $filter
        );

        // Set pager manually
        $this->pager->store('default', $page, $perPage, $totalCount);

        return $results;
    }

    /**
     * Get total count of grouped books for pagination
     */
    public function getGroupedBooksCount(
        $keyword = null,
        $pengarang = null,
        $penerbit = null,
        $tempatTerbit = null,
        $tahunTerbit = null,
        $jenisBuku = null,
        $kategoriBuku = null,
        $status = null,
        $keadaan = null,
        $bahasa = null,
        $rak = null,
        $filter = null
    ) {
        // Create subquery to count grouped results
        $subQuery = $this->db->table($this->table);

        // Apply same filters as getAllWithFiltersGrouped
        if (!empty($keyword)) {
            $subQuery->groupStart()
                ->like('judul', $keyword)
                ->orLike('pengarang', $keyword)
                ->orLike('penerbit', $keyword)
                ->orLike('subjek', $keyword)
                ->orLike('isbn', $keyword)
                ->groupEnd();
        }

        if (!empty($pengarang)) {
            $subQuery->where('pengarang', $pengarang);
        }

        if (!empty($penerbit)) {
            $subQuery->where('penerbit', $penerbit);
        }

        if (!empty($tempatTerbit)) {
            $subQuery->where('tempatTerbit', $tempatTerbit);
        }

        if (!empty($tahunTerbit)) {
            $subQuery->where('tahunTerbit', $tahunTerbit);
        }

        if (!empty($jenisBuku)) {
            $subQuery->where('jenisBuku', $jenisBuku);
        }

        if (!empty($kategoriBuku)) {
            $subQuery->where('kategoriBuku', $kategoriBuku);
        }

        if (!empty($status)) {
            $subQuery->where('status', $status);
        }

        if (!empty($keadaan)) {
            $subQuery->where('keadaan', $keadaan);
        }

        if (!empty($bahasa)) {
            $subQuery->where('bahasa', $bahasa);
        }

        if (!empty($rak)) {
            $subQuery->where('rak', $rak);
        }

        if ($filter === 'no_image') {
            $subQuery->groupStart()
                ->where('foto', '')
                ->orWhere('foto', 'no_cover.jpeg')
                ->orWhere('foto', 'default.jpg')
                ->orWhere('foto', null)
                ->groupEnd();
        }

        // Select and group by to get distinct combinations
        $subQuery->select('judul, pengarang, penerbit')
            ->groupBy(['judul', 'pengarang', 'penerbit']);

        // Get the SQL and count the results
        $sql = $subQuery->getCompiledSelect();

        // Count the grouped results
        $countQuery = $this->db->query("SELECT COUNT(*) as total FROM ($sql) as grouped_results");
        $result = $countQuery->getRow();

        return $result ? $result->total : 0;
    }

    /**
     * Get multiple books by IDs for bulk operations
     */
    public function getBulkBooks($ids)
    {
        if (is_string($ids)) {
            $ids = explode(',', $ids);
        }

        $ids = array_map('trim', $ids);
        $ids = array_filter($ids, 'is_numeric');

        return $this->whereIn('id_buku', $ids)->findAll();
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

    public function getAllBooks()
    {
        return $this->findAll();
    }

    public function getExistingCopiesByBook($judul, $pengarang, $penerbit)
    {
        return $this->where([
            'judul' => $judul,
            'pengarang' => $pengarang,
            'penerbit' => $penerbit
        ])->orderBy('id_buku', 'ASC')->findAll();
    }

    /**
     * Check if a kode eksemplar already exists
     */
    public function isKodeEksemplarExists($kodeEksemplar)
    {
        return $this->where('kodeEksemplar', $kodeEksemplar)->first() !== null;
    }

    /**
     * Get all unique kode eksemplar for a specific book group
     */
    public function getExistingKodeEksemplar($judul, $pengarang, $penerbit)
    {
        $result = $this->select('kodeEksemplar')
            ->where([
                'judul' => $judul,
                'pengarang' => $pengarang,
                'penerbit' => $penerbit
            ])
            ->whereNotNull('kodeEksemplar')
            ->where('kodeEksemplar !=', '')
            ->orderBy('kodeEksemplar', 'ASC')
            ->findAll();

        return array_column($result, 'kodeEksemplar');
    }

    /**
     * Count total eksemplar for a specific book
     */
    public function countEksemplarByBook($judul, $pengarang, $penerbit)
    {
        return $this->where([
            'judul' => $judul,
            'pengarang' => $pengarang,
            'penerbit' => $penerbit
        ])->countAllResults();
    }

    /**
     * Delete multiple books by IDs
     */
    public function deleteMultiple($ids)
    {
        if (empty($ids)) {
            return false;
        }

        return $this->whereIn('id_buku', $ids)->delete();
    }

    /**
     * Get the next available number for kode eksemplar generation
     */
    public function getNextAvailableNumber($prefix = '', $suffix = '')
    {
        $builder = $this->db->table($this->table);

        if (!empty($prefix) && !empty($suffix)) {
            $builder->like('kodeEksemplar', $prefix, 'after')
                ->like('kodeEksemplar', $suffix, 'before');
        } elseif (!empty($prefix)) {
            $builder->like('kodeEksemplar', $prefix, 'after');
        }

        $result = $builder->select('kodeEksemplar')
            ->orderBy('kodeEksemplar', 'DESC')
            ->get()
            ->getResultArray();

        if (empty($result)) {
            return 1;
        }

        $maxNumber = 0;
        foreach ($result as $row) {
            $kode = $row['kodeEksemplar'];
            // Extract number from kode eksemplar
            preg_match_all('/\d+/', $kode, $matches);
            if (!empty($matches[0])) {
                $number = (int)end($matches[0]);
                $maxNumber = max($maxNumber, $number);
            }
        }

        return $maxNumber + 1;
    }


    public function getFilteredBooksGrouped($filters = [])
    {
        // Gunakan $this->db untuk membuat query builder baru
        $builder = $this->db->table($this->table);

        $builder->select('
        MIN(id_buku) as id_buku,
        MIN(kode) as kode,
        GROUP_CONCAT(DISTINCT kodeEksemplar ORDER BY kodeEksemplar SEPARATOR ", ") as kodeEksemplar,
        judul,
        MIN(pengarang) as pengarang,
        MIN(jenisPengarang) as jenisPengarang,
        MIN(penerbit) as penerbit,
        MIN(tempatTerbit) as tempatTerbit,
        MIN(tahunTerbit) as tahunTerbit,
        MIN(kategoriBuku) as kategoriBuku,
        MIN(rak) as rak,
        MIN(status) as status,
        MIN(foto) as foto,
        COUNT(*) as eksemplar
    ');

        // Apply filters
        if (!empty($filters['keyword'])) {
            $builder->groupStart()
                ->like('judul', $filters['keyword'])
                ->orLike('pengarang', $filters['keyword'])
                ->orLike('kode', $filters['keyword'])
                ->groupEnd();
        }

        if (!empty($filters['pengarang'])) {
            $builder->like('pengarang', $filters['pengarang']);
        }

        if (!empty($filters['penerbit'])) {
            $builder->where('penerbit', $filters['penerbit']);
        }

        if (!empty($filters['tempatTerbit'])) {
            $builder->where('tempatTerbit', $filters['tempatTerbit']);
        }

        if (!empty($filters['tahunTerbit'])) {
            $builder->where('tahunTerbit', $filters['tahunTerbit']);
        }

        if (!empty($filters['kategoriBuku'])) {
            $builder->where('kategoriBuku', $filters['kategoriBuku']);
        }

        if (!empty($filters['status'])) {
            $builder->where('status', $filters['status']);
        }

        $builder->groupBy('judul, pengarang, penerbit')
            ->orderBy('judul', 'ASC');

        return $builder->get()->getResultArray();
    }
}
