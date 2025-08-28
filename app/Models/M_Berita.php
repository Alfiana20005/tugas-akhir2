<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Berita extends Model
{
    protected $table = 'berita';
    protected $primaryKey = 'id_berita';
    protected $useTimestamps = false;

    // Tambahkan 'slug' ke allowedFields
    protected $allowedFields = ['judul', 'slug', 'tanggal', 'type', 'isi', 'foto', 'penulis', 'sumber', 'link', 'kategoriBerita', 'ketgambar', 'jenisBerita'];

    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;
    protected $cleanValidationRules = true;

    protected $beforeInsert = ['generateSlug'];
    protected $beforeUpdate = ['generateSlug'];

    // Method helper langsung di dalam Model
    private function createSlug($string)
    {
        $slug = strtolower($string);
        $slug = str_replace(['à', 'á', 'â', 'ã', 'ä', 'å'], 'a', $slug);
        $slug = str_replace(['è', 'é', 'ê', 'ë'], 'e', $slug);
        $slug = str_replace(['ì', 'í', 'î', 'ï'], 'i', $slug);
        $slug = str_replace(['ò', 'ó', 'ô', 'õ', 'ö'], 'o', $slug);
        $slug = str_replace(['ù', 'ú', 'û', 'ü'], 'u', $slug);
        $slug = preg_replace('/[^a-z0-9]+/', '-', $slug);
        $slug = trim($slug, '-');
        $slug = substr($slug, 0, 100);
        return $slug;
    }

    private function ensureUniqueSlug($slug, $id = null)
    {
        $originalSlug = $slug;
        $counter = 1;

        while (true) {
            $exists = $this->where('slug', $slug);
            if ($id) {
                $exists = $exists->where('id_berita !=', $id);
            }

            if (!$exists->first()) {
                break;
            }

            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }

        return $slug;
    }

    protected function generateSlug(array $data)
    {
        if (isset($data['data']['judul'])) {
            $slug = $this->createSlug($data['data']['judul']);
            $slug = $this->ensureUniqueSlug($slug, $data['data']['id_berita'] ?? null);
            $data['data']['slug'] = $slug;
        }
        return $data;
    }

    public function generateSlugFromTitle($title, $id = null)
    {
        $slug = $this->createSlug($title);
        return $this->ensureUniqueSlug($slug, $id);
    }

    public function getBySlug($slug)
    {
        return $this->where('slug', $slug)->first();
    }

    public function getBeritaBaru()
    {
        return $this->orderBy('tanggal', 'DESC')
            ->findAll();
    }

    public function getBerita($id_berita)
    {
        return $this->find($id_berita);
    }

    // Method baru untuk get berita by slug
    public function getBeritaBySlug($slug)
    {
        return $this->getBySlug($slug);
    }

    public function getDataByLevel($level)
    {
        return $this->where('level', $level)->findAll();
    }

    public function getBeritaTerbaruHome($limit = null)
    {
        return $this->where('type', 'Narasi')
            ->orderBy('tanggal', 'DESC')
            ->findAll($limit);
    }

    public function getBeritaTerbaru($limit = null)
    {
        return $this->where('type', 'Link')
            ->orderBy('tanggal', 'DESC')
            ->findAll($limit);
    }

    public function getBeritaByKategori($kategoriBerita, $limit = null)
    {
        $builder = $this->db->table('berita');
        $builder->where('kategoriBerita', $kategoriBerita);
        $builder->orderBy('tanggal', 'DESC');

        if ($limit !== null) {
            $builder->limit($limit);
        }

        return $builder->get()->getResultArray();
    }

    public function getBeritaByKategoriAll($kategoriBerita)
    {
        return $this->where('kategoriBerita', $kategoriBerita)
            ->orderBy('tanggal', 'DESC')
            ->findAll();
    }

    public function getDataByJenis($jenisBerita)
    {
        return $this->db->table('berita')
            ->where('jenisBerita', $jenisBerita)
            ->get()
            ->getResultArray();
    }

    public function get()
    {
        return $this->db->table('berita')
            ->get()
            ->getResultArray();
    }
}
