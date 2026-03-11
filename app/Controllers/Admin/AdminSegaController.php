<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\M_Sega;

class AdminSegaController extends BaseController
{
    protected $helpers = ['form', 'slug'];
    protected $M_Sega;

    public function __construct()
    {
        helper(['form', 'slug']);
        $this->M_Sega = new M_Sega();
    }

    private function getExcerpt($text, $wordLimit)
    {
        if (empty($text)) {
            return '';
        }
        $words = explode(' ', strip_tags($text));
        if (count($words) > $wordLimit) {
            $excerpt = implode(' ', array_slice($words, 0, $wordLimit)) . '...';
        } else {
            $excerpt = implode(' ', $words);
        }
        return $excerpt;
    }

    public function sega(): string
    {
        $data_sega = $this->M_Sega->findAll();
        foreach ($data_sega as &$sega) {
            $sega['deskripsi_pendek1'] = $this->getExcerpt($sega['deskripsi_indo'], 10);
            $sega['deskripsi_pendek2'] = $this->getExcerpt($sega['deskripsi_eng'], 10);
        }

        $data = [
            'title' => 'Daftar Sega',
            'sega' => $data_sega
        ];

        return view('CompanyProfile/segaAdmin', $data);
    }

    public function saveSega()
    {
        $rules = [
            'judul' => [
                'rules' => 'required',
                'errors' => ['required' => 'Judul harus diisi']
            ],
            'deskripsi_indo' => [
                'rules' => 'required',
                'errors' => ['required' => 'Deskripsi Indonesia harus diisi']
            ],
            'foto' => [
                'rules' => 'uploaded[foto]|max_size[foto,2048]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => 'Foto harus diupload',
                    'max_size' => 'Ukuran foto maksimal 2MB',
                    'is_image' => 'File yang diupload harus berupa gambar',
                    'mime_in' => 'Format foto harus JPG, JPEG, atau PNG'
                ]
            ],
            'audio_id' => [
                'rules' => 'uploaded[audio_id]|max_size[audio_id,2048]|mime_in[audio_id,audio/mpeg,audio/mp3,audio/wav]',
                'errors' => [
                    'uploaded' => 'Audio Indonesia harus diupload',
                    'max_size' => 'Ukuran audio maksimal 2MB',
                    'mime_in' => 'Format audio harus MP3/WAV'
                ]
            ],
            'audio_eng' => [
                'rules' => 'permit_empty|max_size[audio_eng,2048]|mime_in[audio_eng,audio/mpeg,audio/mp3,audio/wav]',
                'errors' => [
                    'max_size' => 'Ukuran audio maksimal 2MB',
                    'mime_in' => 'Format audio harus MP3/WAV'
                ]
            ]
        ];

        if (!$this->validate($rules)) {
            return redirect()->to('/sega')->withInput()->with('errors', $this->validator->listErrors());
        }

        $foto = $this->request->getFile('foto');
        $fotoName = $foto->getRandomName();
        $foto->move('img/sega', $fotoName);

        $file1 = $this->request->getFile('audio_id');
        $filename1 = $file1->getRandomName();
        $file1->move('audio', $filename1);

        $file2 = $this->request->getFile('audio_eng');
        $filename2 = 'null';

        if ($file2 && $file2->isValid() && !$file2->hasMoved()) {
            $filename2 = $file2->getRandomName();
            $file2->move('audio', $filename2);
        }

        $judul = $this->request->getVar('judul');
        
        // Coba memanggil fungsi slug, jika belum ada gunakan fallback manual
        if (function_exists('generateSlugFromTitle')) {
            $slug = generateSlugFromTitle($judul, 3);
            if (function_exists('ensureUniqueSlug')) {
                $slug = ensureUniqueSlug($slug, $this->M_Sega);
            }
        } else {
            // Fallback
            $slug = mb_url_title($judul, '-', true);
            $count = $this->M_Sega->where('slug', $slug)->countAllResults();
            if ($count > 0) {
                $slug = $slug . '-' . time();
            }
        }

        $this->M_Sega->save([
            'judul' => $judul,
            'slug' => $slug,
            'deskripsi_indo' => $this->request->getVar('deskripsi_indo'),
            'deskripsi_eng' => $this->request->getVar('deskripsi_eng'),
            'foto' => $fotoName,
            'audio_id' => $filename1,
            'audio_eng' => $filename2,
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan.');
        return redirect()->to('/sega');
    }

    public function previewSega($slug): string
    {
        $sega = $this->M_Sega->getSega($slug);

        if (!$sega) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $data = [
            'sega' => $sega,
        ];

        return view('CompanyProfile/previewSega', $data);
    }

    public function deleteSega($id_Sega)
    {
        $id_Sega = filter_var($id_Sega, FILTER_SANITIZE_NUMBER_INT);
        $this->M_Sega->delete($id_Sega);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus.');

        return redirect()->to('/sega');
    }

    public function updateSega($id_sega)
    {
        $judul = $this->request->getVar('judul');
        $slug = $this->request->getVar('slug');

        $rules = [
            'slug' => [
                'rules' => 'required|max_length[255]',
                'errors' => [
                    'required' => 'Slug harus diisi',
                    'max_length' => 'Slug maksimal 255 karakter'
                ]
            ]
        ];

        if (!$this->validate($rules)) {
            return redirect()->to('/sega')->withInput()->with('errors', $this->validator->listErrors());
        }

        $dataToUpdate = [
            'judul' => $judul,
            'deskripsi_indo' => $this->request->getVar('deskripsi_indo'),
            'deskripsi_eng' => $this->request->getVar('deskripsi_eng'),
        ];

        $currentData = $this->M_Sega->where('id_sega', $id_sega)->first();

        if ($currentData && $currentData['slug'] !== $slug) {
            $slug = strtolower(trim($slug));
            $slug = preg_replace('/[^a-z0-9-_]/', '-', $slug);
            $slug = preg_replace('/-+/', '-', $slug);
            $slug = trim($slug, '-');

            $existingSlug = $this->M_Sega->where('slug', $slug)
                ->where('id_sega !=', $id_sega)
                ->first();

            if ($existingSlug) {
                session()->setFlashdata('error', "Slug '{$slug}' sudah digunakan. Silakan gunakan slug lain.");
                return redirect()->to('/sega')->withInput();
            }

            $dataToUpdate['slug'] = $slug;
        }

        $foto = $this->request->getFile('foto');
        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            $fotoName = $foto->getRandomName();
            $foto->move('img/sega', $fotoName);
            $dataToUpdate['foto'] = $fotoName;

            if ($currentData && !empty($currentData['foto']) && file_exists('img/sega/' . $currentData['foto'])) {
                unlink('img/sega/' . $currentData['foto']);
            }
        }

        $file1 = $this->request->getFile('audio_id');
        if ($file1 && $file1->isValid() && !$file1->hasMoved()) {
            $filename1 = $file1->getRandomName();
            $file1->move('audio', $filename1);
            $dataToUpdate['audio_id'] = $filename1;

            if ($currentData && !empty($currentData['audio_id']) && $currentData['audio_id'] !== 'null' && file_exists('audio/' . $currentData['audio_id'])) {
                unlink('audio/' . $currentData['audio_id']);
            }
        }

        $file2 = $this->request->getFile('audio_eng');
        if ($file2 && $file2->isValid() && !$file2->hasMoved()) {
            $filename2 = $file2->getRandomName();
            $file2->move('audio', $filename2);
            $dataToUpdate['audio_eng'] = $filename2;

            if ($currentData && !empty($currentData['audio_eng']) && $currentData['audio_eng'] !== 'null' && file_exists('audio/' . $currentData['audio_eng'])) {
                unlink('audio/' . $currentData['audio_eng']);
            }
        }

        $dataToUpdate = array_filter($dataToUpdate);

        if (!empty($dataToUpdate)) {
            $this->M_Sega->update($id_sega, $dataToUpdate);
            $newDataSega = $this->M_Sega->where('id_sega', $id_sega)->first();

            if (session()->get('level') == 'Admin') {
                session()->set([
                    'judul' => $newDataSega['judul'],
                    'slug' => $newDataSega['slug'],
                    'deskripsi_indo' => $newDataSega['deskripsi_indo'],
                    'deskripsi_eng' => $newDataSega['deskripsi_eng'],
                    'foto' => $newDataSega['foto'],
                    'audio_id' => $newDataSega['audio_id'],
                    'audio_eng' => $newDataSega['audio_eng'],
                ]);
            }

            session()->setFlashdata('pesan', 'Data Berhasil diubah.');
        } else {
            session()->setFlashdata('error', 'Tidak ada data yang diupdate.');
        }

        return redirect()->to('/sega');
    }
}
