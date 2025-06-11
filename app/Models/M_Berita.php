<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Berita extends Model
{
    protected $table = 'berita';
    protected $primaryKey = 'id_berita';
    protected $useTimestamps = false;


    // protected $allowedFields = ['foto', 'nama','password','email','username','level'];
    protected $allowedFields = ['judul', 'tanggal', 'type', 'isi', 'foto', 'penulis', 'sumber', 'link', 'kategoriBerita', 'ketgambar', 'jenisBerita'];


    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;
    protected $cleanValidationRules = true;

    public function getBeritaBaru()
    {
        return $this->orderBy('tanggal', 'DESC')
            ->findAll();
    }
    public function getBerita($id_berita)
    {
        return $this->find($id_berita);
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
