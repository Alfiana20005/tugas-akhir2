<?php

namespace App\Controllers;

use App\Models\M_Petugas;

class C_Login extends BaseController
{
    protected $helpers = ['form'];
    protected $M_Petugas;
    public function __construct() {
        helper('form');
        $this -> M_Petugas = new M_Petugas();
    }
    public function index(): string
    {
        return view('v_login');
    }
    public function register(): string
    {
        $data = array(
            'title' => 'Register',
        );
        return view('v_tambahPetugas', $data);
    }
    public function login()
    {
        $rules = [
            'username' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Username tidak boleh kosong'
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
            return redirect()->to('/halamanLogin')->withInput()->with('errors', $this->validator->listErrors());
        }

        // Jika validasi berhasil
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $cek = $this->M_Petugas->login($username, $password);

        if ($cek) {
            // Jika data cocok
            session()->set('log', true);
            session()->set('id_petugas', $cek['id_petugas']);
            session()->set('nip', $cek['nip']);
            session()->set('nama', $cek['nama']);
            session()->set('username', $cek['username']);
            session()->set('email', $cek['email']);
            session()->set('level', $cek['level']);
            session()->set('password', $cek['password']);
            session()->set('foto', $cek['foto']);

            return redirect()->to(base_url('/dashboard'));
        } else {
            // Jika data tidak cocok
            session()->setFlashdata('pesanlogin', 'Login Gagal, data yang Anda masukkan tidak cocok');
            return redirect()->to(base_url('/halamanLogin'));
        }

       
    }
    public function logout() {
        session()->remove('log');
        session()->remove('nama');
        session()->remove('nip');
        session()->remove('username');
        session()->remove('email');
        session()->remove('level');
        session()->remove('password');
        session()->remove('foto');
        
        session()->setFlashdata('pesanlogout', 'Logout Berhasil');
            return redirect()->to(base_url('/'));
    }
    
    
        


    

}
