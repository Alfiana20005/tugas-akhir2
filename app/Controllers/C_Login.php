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
        if (!session()->get('log')) {
            return redirect()->to('/halamanLogin')->with('error', 'Silakan login terlebih dahulu.');
        }
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
    // public function login()
    // {
    //     $rules = [
    //         'username' => [
    //             'rules' => 'required',
    //             'errors' => [
    //                 'required' => 'Username tidak boleh kosong'
    //             ]
    //         ],
    //         'password' => [
    //             'rules' => 'required',
    //             'errors' => [
    //                 'required' => 'Password tidak boleh kosong'
    //             ]
    //         ]
    //     ];

    //     if (!$this->validate($rules)) {
    //         // Validasi tidak berhasil
    //         return redirect()->to('/halamanLogin')->withInput()->with('errors', $this->validator->listErrors());
    //     }

    //     // Jika validasi berhasil
    //     $username = $this->request->getPost('username');
    //     $password = $this->request->getPost('password');
    //     $cek = $this->M_Petugas->login($username, $password);

    //     if ($cek) {
    //         // Jika data cocok
    //         session()->set('log', true);
    //         session()->set('id_petugas', $cek['id_petugas']);
    //         session()->set('nip', $cek['nip']);
    //         session()->set('nama', $cek['nama']);
    //         session()->set('username', $cek['username']);
    //         session()->set('email', $cek['email']);
    //         session()->set('level', $cek['level']);
    //         session()->set('password', $cek['password']);
    //         session()->set('foto', $cek['foto']);

    //         return redirect()->to(base_url('/dashboard'));
    //     } else {
    //         // Jika data tidak cocok
    //         session()->setFlashdata('pesanlogin', 'Login Gagal, data yang Anda masukkan tidak cocok');
    //         return redirect()->to(base_url('/halamanLogin'));
    //     }

       
    // }
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
            return redirect()->to('/halamanLogin')->withInput()->with('errors', $this->validator->listErrors());
        }
    
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
    
        // Ambil user berdasarkan username
        $petugas = $this->M_Petugas->where('username', $username)->first();
    
        if ($petugas) {
            // Cek apakah password masih dalam bentuk plain text
            if ($petugas['password'] === $password) {
                // Jika iya, hash password dan update ke database
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                $this->M_Petugas->update($petugas['id_petugas'], ['password' => $hashedPassword]);
    
                // Sekarang gunakan hashed password untuk verifikasi selanjutnya
                $petugas['password'] = $hashedPassword;
            }
    
            // Verifikasi password (sudah pasti hashed setelah pengecekan di atas)
            if (password_verify($password, $petugas['password'])) {
                // Set session
                session()->set([
                    'log'       => true,
                    'id_petugas'=> $petugas['id_petugas'],
                    'nip'       => $petugas['nip'],
                    'nama'      => $petugas['nama'],
                    'username'  => $petugas['username'],
                    'email'     => $petugas['email'],
                    'level'     => $petugas['level'],
                    'foto'      => $petugas['foto']
                ]);
    
                return redirect()->to(base_url('/dashboard'));
            }
        }
    
        // Jika login gagal
        session()->setFlashdata('pesanlogin', 'Login Gagal, username atau password salah');
        return redirect()->to(base_url('/halamanLogin'));
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
        // $this->session->destroy();
        
        session()->setFlashdata('pesanlogout', 'Logout Berhasil');
            return redirect()->to(base_url('/halamanLogin'));
    }
    
    
        


    

}
