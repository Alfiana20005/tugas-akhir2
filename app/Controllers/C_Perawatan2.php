<?php

namespace App\Controllers;

use App\Models\M_Petugas;
use App\Models\M_Perawatan2;

class C_Perawatan2 extends BaseController
{
    protected $M_Petugas; //agar bisa digunakan oleh semua kelas
    protected $M_Perawatan2;

    public function __construct() {

        //mendefinisikan model yang digunakan
        $this -> M_Petugas = new M_Petugas();
        $this -> M_Perawatan2 = new M_Perawatan2();
        
    }
    public function perawatanPreventif() 
    
    {
        $dataPerawatan = $this->M_Perawatan2->getPreventif();
        if (!is_null($dataPerawatan)) {
            foreach ($dataPerawatan as &$perawatanItem) {
                $petugasName = $this->M_Perawatan2->getPetugasName($perawatanItem['id_petugas']);
                $perawatanItem['petugas_name'] = isset($petugasName['nama']) ? $petugasName['nama'] : 'Nama Petugas Tidak Tersedia';
                
                $jenisprwData = $this->M_Perawatan2->getJenisPrwName($perawatanItem['kode_jenisprw']);
                $perawatanItem['jenisprw'] = isset($jenisprwData['jenis_prw']) ? $jenisprwData['jenis_prw'] : 'Nama Kategori Tidak Tersedia';
                
            }
            
        } else {
            $pesanKosong = 'Data Perawatan tidak tersedia untuk koleksi ini.';
            return view('pengkajian/v_dataPerawatan', ['perawatan' => [], 'koleksi' => [], 'pesan_kosong' => $pesanKosong]);
        }



        $data =[
            'title' => 'Daftar gallery',
            'dataPerawatan' => $dataPerawatan
        ];
    
        return view('pengkajian/v_perawatanPreventif', $data);

    }

    public function savePerawatanPreventif() {

        $foto = $this->request->getFile('foto_sebelum');
        $dafaultImg = 'images.jpeg';
    
        if ($foto->isValid() && !$foto->hasMoved()) {
            $fotoName = $foto->getRandomName();
            $foto->move('img/sebelum', $fotoName);
        } else {
            // Handle file upload error
            $fotoName = $dafaultImg;
            
        }

        //tambahh data
        // $this->M_Petugas->save($this->request->getPost());
        $this->M_Perawatan2->save([
            'no_registrasi' => $this->request->getVar('no_registrasi'),
            'nama_inv' => $this->request->getVar('nama_inv'),
            'kode_jenisprw' => '01',
            'deskripsi' => $this->request->getVar('deskripsi'),
            'rak' => $this->request->getVar('rak'),
            'lemari' => $this->request->getVar('lemari'),
            'lokasi' => $this->request->getVar('lokasi'),
            'tanggal_sebelum' => $this->request->getVar('tanggal_sebelum'),
            'penanggung_jawab' => $this->request->getVar('penanggung_jawab'),
            'kode_kategori' => $this->request->getVar('kode_kategori'),
            'foto_sebelum' => $fotoName,
            'status'=> 'Selesai',
            'id_petugas' => session()->get('id_petugas'),

            
        ]);

        //alert
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan.');

        return redirect()-> to('/perawatanPreventif');

        
    }
    public function perawatanKuratif() 
    {
        $dataPerawatan = $this->M_Perawatan2->getKuratif();
        
        if (!is_null($dataPerawatan)) {
            foreach ($dataPerawatan as &$perawatanItem) {
                $petugasName = $this->M_Perawatan2->getPetugasName($perawatanItem['id_petugas']);
                $perawatanItem['petugas_name'] = isset($petugasName['nama']) ? $petugasName['nama'] : 'Nama Petugas Tidak Tersedia';
                
                $jenisprwData = $this->M_Perawatan2->getJenisPrwName($perawatanItem['kode_jenisprw']);
                $perawatanItem['jenisprw'] = isset($jenisprwData['jenis_prw']) ? $jenisprwData['jenis_prw'] : 'Nama Kategori Tidak Tersedia';
                
            }
            
        } else {
            $pesanKosong = 'Data Perawatan tidak tersedia untuk koleksi ini.';
            return view('pengkajian/v_dataPerawatan', ['perawatan' => [], 'koleksi' => [], 'pesan_kosong' => $pesanKosong]);
        }


        $data =[
            'title' => 'Daftar gallery',
            'dataPerawatan' => $dataPerawatan
        ];
    
        
    
        return view('pengkajian/v_perawatanKuratif', $data);
    }

    public function savePerawatanKuratif() {

        $foto = $this->request->getFile('foto_sebelum');
        $dafaultImg = 'images.jpeg';
    
        if ($foto->isValid() && !$foto->hasMoved()) {
            $fotoName = $foto->getRandomName();
            $foto->move('img/sebelum', $fotoName);
        } else {
            // Handle file upload error
            $fotoName = $dafaultImg;
            
        }


        //tambahh data
        // $this->M_Petugas->save($this->request->getPost());
        $this->M_Perawatan2->save([
            'no_registrasi' => $this->request->getVar('no_registrasi'),
            'nama_inv' => $this->request->getVar('nama_inv'),
            'kode_jenisprw' => '02',
            'deskripsi' => $this->request->getVar('deskripsi'),
            'rak' => $this->request->getVar('rak'),
            'lemari' => $this->request->getVar('lemari'),
            'lokasi' => $this->request->getVar('lokasi'),
            'tanggal_sebelum' => $this->request->getVar('tanggal_sebelum'),
            'penanggung_jawab' => $this->request->getVar('penanggung_jawab'),
            'kode_kategori' => $this->request->getVar('kode_kategori'),
            'foto_sebelum' => $fotoName,
            'status'=> 'Sedang Dirawat',
            'id_petugas' => session()->get('id_petugas'),
            
        ]);

        //alert
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan.');

        return redirect()-> to('/perawatanKuratif');

        
    }
    
    public function delete($id_perawatan2) 
    {
        // Saring masukan untuk mencegah SQL injection atau serangan lainnya
        $id_perawatan2 = filter_var($id_perawatan2, FILTER_SANITIZE_NUMBER_INT);
    
        // Panggil metode delete pada model atau apapun yang diperlukan
        $this->M_Perawatan2->delete($id_perawatan2);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus.');
    
        // Redirect ke halaman yang sesuai
        return redirect()->back();
    }
    
    public function updatePerawatan($id_perawatan2) {
        // Mengambil data yang akan diupdate dari request
        $dataToUpdate = [

            'no_registrasi' => $this->request->getVar('no_registrasi'),
            'nama_inv' => $this->request->getVar('nama_inv'),
            'deskripsi' => $this->request->getVar('deskripsi'),
            'rak' => $this->request->getVar('rak'),
            'lemari' => $this->request->getVar('lemari'),
            'lokasi' => $this->request->getVar('lokasi'),
            'tanggal_sebelum' => $this->request->getVar('tanggal_sebelum'),
            'tanggal_sesudah' => $this->request->getVar('tanggal_sesudah'),
            'penanggung_jawab' => $this->request->getVar('penanggung_jawab'),
            'kode_kategori' => $this->request->getVar('kode_kategori'),
            'foto_sebelum' => $this->request->getVar('foto_sebelum'),
            'foto_setelah' => $this->request->getVar('foto_setelah'),
            'status'=>  $this->request->getVar('status'),
            'id_petugas' => session()->get('id_petugas'),
            
        ];
    
        $foto = $this->request->getFile('foto_setelah');

        // Cek apakah file foto diunggah
        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            // Generate nama unik untuk file foto
            $fotoName = $foto->getRandomName();

            // Pindahkan file foto ke folder yang diinginkan
            $foto->move('img/sesudah', $fotoName); // Perbarui path sesuai dengan folder yang diinginkan

            // Tambahkan nama file foto ke data yang akan diupdate
            $dataToUpdate['foto_setelah'] = $fotoName;
        }
    
        // Membersihkan data yang mungkin ada dari inputan form
        $dataToUpdate = array_filter($dataToUpdate);
    
        // Memastikan ada data yang akan diupdate
        if (!empty($dataToUpdate)) {
            // Mengeksekusi perintah update
            $this->M_Perawatan2->update($id_perawatan2, $dataToUpdate);
    
            // Ambil data petugas setelah diubah dari database
            $newDataPerawatan = $this->M_Perawatan2->getPerawatan2($id_perawatan2);
    
            // Perbarui sesi pengguna dengan data baru
            if (session()->get('level') != 'Admin') {
                session()->set([
                    
                    'no_registrasi' => $newDataPerawatan['no_registrasi'],
                    'nama_inv' => $newDataPerawatan['nama_inv'],
                    'deskripsi' => $newDataPerawatan['deskripsi'],
                    'rak' => $newDataPerawatan['rak'],
                    'lemari' => $newDataPerawatan['lemari'],
                    'lokasi' => $newDataPerawatan['lokasi'],
                    'tanggal_sebelum' => $newDataPerawatan['tanggal_sebelum'],
                    'tanggal_sesudah' => $newDataPerawatan['tanggal_sesudah'],
                    'foto_sebelum' =>$newDataPerawatan['foto_sebelum'],
                    'foto_setelah' =>$newDataPerawatan['foto_setelah'],
                    'kode_kategori' =>$newDataPerawatan['kode_kategori'],
                    'status'=>  $newDataPerawatan['status'],
                    'id_petugas' => $newDataPerawatan['id_petugas'],
                ]);
            }
            //alert
            session()->setFlashdata('pesan', 'Data Berhasil diubah.');
        } else {
            // Jika tidak ada data yang diupdate, munculkan pesan kesalahan
            session()->setFlashdata('error', 'Tidak ada data yang diupdate.');
        }
        // dd('berhasil');
    
        // Redirect ke halaman sebelumnya atau halaman yang sesuai
        return redirect()->back();
    }




    public function perawatanRestorasi() 
    {
        $dataPerawatan = $this->M_Perawatan2->getRestorasi();
        
        if (!is_null($dataPerawatan)) {
            foreach ($dataPerawatan as &$perawatanItem) {
                $petugasName = $this->M_Perawatan2->getPetugasName($perawatanItem['id_petugas']);
                $perawatanItem['petugas_name'] = isset($petugasName['nama']) ? $petugasName['nama'] : 'Nama Petugas Tidak Tersedia';
                
                $jenisprwData = $this->M_Perawatan2->getJenisPrwName($perawatanItem['kode_jenisprw']);
                $perawatanItem['jenisprw'] = isset($jenisprwData['jenis_prw']) ? $jenisprwData['jenis_prw'] : 'Nama Kategori Tidak Tersedia';
                
            }
            
        } else {
            $pesanKosong = 'Data Perawatan tidak tersedia untuk koleksi ini.';
            return view('pengkajian/v_dataPerawatan', ['perawatan' => [], 'koleksi' => [], 'pesan_kosong' => $pesanKosong]);
        }


        $data =[
            'title' => 'Daftar Perawatan',
            'dataPerawatan' => $dataPerawatan
        ];
    
        return view('pengkajian/v_perawatanRestorasi', $data);
    }
    public function savePerawatanRestorasi() {

        $foto = $this->request->getFile('foto_sebelum');
        $dafaultImg = 'images.jpeg';
    
        if ($foto->isValid() && !$foto->hasMoved()) {
            $fotoName = $foto->getRandomName();
            $foto->move('img/sebelum', $fotoName);
        } else {
            // Handle file upload error
            $fotoName = $dafaultImg;
           
        }


        //tambahh data
        // $this->M_Petugas->save($this->request->getPost());
        $this->M_Perawatan2->save([
            'no_registrasi' => $this->request->getVar('no_registrasi'),
            'nama_inv' => $this->request->getVar('nama_inv'),
            'kode_jenisprw' => '03',
            'deskripsi' => $this->request->getVar('deskripsi'),
            'rak' => $this->request->getVar('rak'),
            'lemari' => $this->request->getVar('lemari'),
            'lokasi' => $this->request->getVar('lokasi'),
            'tanggal_sebelum' => $this->request->getVar('tanggal_sebelum'),
            'penanggung_jawab' => $this->request->getVar('penanggung_jawab'),
            'kode_kategori' => $this->request->getVar('kode_kategori'),
            'foto_sebelum' => $fotoName,
            'status'=> 'Sedang Dirawat',
            'id_petugas' => session()->get('id_petugas'),
            
        ]);

        //alert
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan.');

        return redirect()-> to('/perawatanRestorasi');
    }

    

    
}
