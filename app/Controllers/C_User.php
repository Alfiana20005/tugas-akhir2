<?php

namespace App\Controllers;

use App\Models\M_User;

class C_User extends BaseController
{
    protected $helpers = ['form'];
    protected $M_User;
    public function __construct() {
        helper('form');
        $this -> M_User = new M_User();
        if (!session()->get('logUser')) {
            return redirect()->to('/manuskrip')->with('error', 'Silakan login terlebih dahulu.');
        }
    }
    public function index(): string
    {
        return view('landingPage/form');
    }

    public function registerUser()
    {
        //validation
        $rules= [
            'nama' => [
                'rules' => 'required',
                'errors' => ['required'=>'nama harus diisi']
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required'=>'password tidak boleh kosong',
                    

                ]
            ],
        ];

        if(!$this->validate($rules)){
            // session()->setFlashdata('errors', $this->validator->listErrors());
            return redirect()->to('/formlogin') ->withInput() -> with('errors', $this->validator->listErrors());
        }


        //tambahh data
        // $this->M_Petugas->save($this->request->getPost());
        $this->M_User->save([


            // 'id_petugas' => $id_petugas,
            'nama' => $this->request->getVar('nama'),
            'pekerjaan' => $this->request->getVar('pekerjaan'),
            'email' => $this->request->getVar('email'),
            'wa' => $this->request->getVar('wa'),
            'password' => $this->request->getVar('password'),
            'accepted' => 'Menunggu',
            'keperluan' => $this->request->getVar('keperluan'),
            'instansi' => $this->request->getVar('instansi'),
            'medsos' => $this->request->getVar('medsos'),
            
        ]);

        //alert
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan. Admin akan melakukan verifikasi 1x 24 jam, silahkan cek login secara berkala');

        return redirect()-> to('/formlogin');

        // return view('admin/v_masterpetugas');
    }
    public function loginUser()
    {
        $rules = [
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'nama tidak boleh kosong'
                ]
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Password tidak boleh kosong'
                ]
            ]
        ];

        if (!$this->validate($rules)) {
            // Validasi tidak berhasil
            return redirect()->to('/formlogin')->withInput()->with('errors', $this->validator->listErrors());
        }

        // Jika validasi berhasil
        $nama = $this->request->getPost('nama');
        $password = $this->request->getPost('password');
        // $accepted = 'diterima';
        $cek = $this->M_User->login($nama, $password);

        if ($cek && $cek['accepted'] === 'Diterima') {
            // Jika data cocok
            session()->set('logUser', true);
            session()->set('id_user', $cek['id_user']);
            session()->set('nama', $cek['nama']);
            session()->set('pekerjaan', $cek['pekerjaan']);
            session()->set('email', $cek['email']);
            session()->set('password', $cek['password']);
            session()->set('wa', $cek['wa']);
            session()->set('accepted', $cek['accepted']);
            session()->set('keperluan', $cek['keperluan']);
            session()->set('instansi', $cek['instansi']);
            session()->set('medsos', $cek['medsos']);

            return redirect()->to(base_url('/manuskrip'));
            // return redirect()->back();
        } else {

            // Pastikan $cek tidak null sebelum mengecek 'accepted'
            if ($cek && $cek['accepted'] === 'Ditolak') {
                session()->setFlashdata('pesanlogin', 'Login Gagal! Hak akses anda DITOLAK, Silahkan konfirmasi langsung ke Admin untuk mendapatkan hak akses');
            } elseif ($cek && $cek['accepted'] === 'Menunggu') {
                session()->setFlashdata('pesanlogin', 'Login Gagal! Hak akses anda belum DITERIMA, mohon menunggu 24 Jam atau konfirmasi langsung ke Admin untuk mendapatkan hak akses');
            } else {
                session()->setFlashdata('pesanlogin', 'Login Gagal! Anda tidak memiliki hak akses, silahkan mendaftar terlebih dahulu untuk mendapatkan hak akses');
            }

            return redirect()->to(base_url('/formlogin'));
        }

       
    }

    public function logoutUser() {
        session()->remove('logUser');
        session()->remove('nama');
        session()->remove('pekerjaan');
        session()->remove('email');
        session()->remove('password');
        session()->remove('wa');
        session()->remove('accepted');
        session()->remove('keperluan');
        session()->remove('instansi');
        
        session()->setFlashdata('pesanlogout', 'Logout Berhasil');
        return redirect()->to(base_url('/manuskrip'));
    }
    
    
        


    

}
