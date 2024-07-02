<?php

namespace App\Controllers;

use App\Models\M_Petugas;

class C_Petugas extends BaseController
{
    protected $M_Petugas; //agar bisa digunakan oleh semua kelas
    

    public function __construct() {

        //mendefinisikan model yang digunakan
        $this -> M_Petugas = new M_Petugas();
        
    }
    public function index(): string
    {
        //setiap manggil model harus pake this
        $petugas = $this->M_Petugas->findAll();


        $data =[
            'title' => 'Daftar Petugas',
            'data_petugas' => $petugas
        ];

        return view('petugas/v_masterpetugas', $data);
    }
    public function formtambah(): string
    {
        
        $data =[
            'title' => 'Tambah Data Petugas',
            'validation' => \Config\Services::validation()
           
        ];
        
        return view('petugas/v_tambahPetugas', $data);
    }

    public function save()
    {
        //validation
        $rules= [
            'nama' => [
                'rules' => 'required|max_length[50]|is_unique[petugas.nama]',
                'errors' => ['required'=>'Nama harus diisi']
            ],
            'username' => [
                'rules' => 'required|max_length[10]|is_unique[petugas.username]',
                'errors' => [
                    'required'=>'Username tidak boleh kosong',
                    'max_length' => 'username maximal 10 huruf',
                    'is_unique' => 'username tidak boleh sama'
    
                ]
            ],
            'password' => [
                'rules' => 'required|max_length[10]',
                'errors' => [
                    'required'=>'password tidak boleh kosong',
                    'max_length' => 'password maximal 10 huruf',
                ]
            ],
            'email' => [
                'rules' => 'required',
                'errors' => [
                    'required'=>'email tidak boleh kosong',
                ]
            ],
            'level' => [
                'rules' => 'required',
                'errors' => [
                    'required'=>'jabatan tidak boleh kosong',
                ]
            ],
            'nip' => [
                'rules' => 'required',
                'errors' => [
                    'required'=>'NIP tidak boleh kosong',
                ]
            ]
        ];

        if(!$this->validate($rules)){
            // session()->setFlashdata('errors', $this->validator->listErrors());
            return redirect()->to('/tambahpetugas') ->withInput() -> with('errors', $this->validator->listErrors());
        }

        //tambahh data
        // $this->M_Petugas->save($this->request->getPost());
        $this->M_Petugas->save([
            // 'id_petugas' => $id_petugas,
            'nama' => $this->request->getVar('nama'),
            'username' => $this->request->getVar('username'),
            'email' => $this->request->getVar('email'),
            'password' => $this->request->getVar('password'),
            'level' => $this->request->getVar('level'),
            'nip' => $this->request->getVar('nip'),
        ]);

        //alert
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan.');

        return redirect()-> to('/petugas');

        // return view('admin/v_masterpetugas');
    }

    public function delete($id_petugas) 
    {
        // Saring masukan untuk mencegah SQL injection atau serangan lainnya
        $id_petugas = filter_var($id_petugas, FILTER_SANITIZE_NUMBER_INT);
    
        // Panggil metode delete pada model atau apapun yang diperlukan
        $this->M_Petugas->delete($id_petugas);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus.');
    
        // Redirect ke halaman yang sesuai
        return redirect()->to('/petugas');
    }  
    public function edit($id_petugas) 
    {
        $data =[
            'title' => 'Ubah Data Petugas',
            'validation' => \Config\Services::validation(),
            'petugas' => $this->M_Petugas->getPetugas($id_petugas)
        ];
        
        return view('petugas/v_ubahPetugas', $data);
        
    } 


    public function update($id_petugas) {
        // Mengambil data yang akan diupdate dari request
        $dataToUpdate = [
            'nip' => $this->request->getVar('nip'),
            'nama' => $this->request->getVar('nama'),
            'username' => $this->request->getVar('username'),
            'email' => $this->request->getVar('email'),
            'password' => $this->request->getVar('password'),
            'level' => $this->request->getVar('level'),
        ];
    
        $foto = $this->request->getFile('foto');

        // Cek apakah file foto diunggah
        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            // Generate nama unik untuk file foto
            $fotoName = $foto->getRandomName();

            // Pindahkan file foto ke folder yang diinginkan
            $foto->move('img/profile', $fotoName); // Perbarui path sesuai dengan folder yang diinginkan

            // Tambahkan nama file foto ke data yang akan diupdate
            $dataToUpdate['foto'] = $fotoName;
        }
    
        // Membersihkan data yang mungkin ada dari inputan form
        $dataToUpdate = array_filter($dataToUpdate);
    
        // Memastikan ada data yang akan diupdate
        if (!empty($dataToUpdate)) {
            // Mengeksekusi perintah update
            $this->M_Petugas->update($id_petugas, $dataToUpdate);
    
            // Ambil data petugas setelah diubah dari database
            $newPetugasData = $this->M_Petugas->getPetugas($id_petugas);
    
            // Perbarui sesi pengguna dengan data baru
            if (session()->get('level') != 'Admin') {
                session()->set([
                    'nama' => $newPetugasData['nama'],
                    'nip' => $newPetugasData['nip'],
                    'username' => $newPetugasData['username'],
                    'email' => $newPetugasData['email'],
                    'password' => $newPetugasData['password'],
                    'level' => $newPetugasData['level'],
                    'foto' => $newPetugasData['foto'],
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


    public function profile() 
    {
        $petugas = $this->M_Petugas->findAll();
        $data =[
            'title' => 'My Profile',
            'data_petugas' => $petugas
        ];
    
        return view('petugas/v_profile', $data);
    }
}
