<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelAuth;

class Auth extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->ModelAuth = new ModelAuth;
    }

    public function index()
    {
        $data = [
            'judul' => 'Login',
            'page' => 'v_login',
        ];
        return view('v_template_login', $data);
    }

    public function LoginUser()
    {
        $data = [
            'judul' => 'Login User',
            'page' => 'v_login_user',
        ];
        return view('v_template_login', $data);
    }

    public function CekLoginUser()
    {
        if ($this->validate([
            'email' => [
                'label' => 'E-Mail',
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => '{field} Masih Kosong!',
                    'valid_email' => '{field} Masukkan format email yang benar!',
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Masih Kosong!',
                ]
            ],
        ])) {
            // Jika entry valid
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');
            $cek_login = $this->ModelAuth->LoginUser($email, $password);
            if ($cek_login) {
                // Jika login berhasil
                session()->set('nama_user', $cek_login['nama_user']);
                session()->set('email', $cek_login['email']);
                session()->set('level', $cek_login['level']);
                return redirect()->to(base_url('Admin'));
            } else {
                // Jika login gagal
                session()->setFlashdata('pesan', 'E-Mail Atau Password Salah !');
                return redirect()->to(base_url('Auth/LoginUser'));
            }
        } else {
            // Jika entry tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('Auth/LoginUser'));
        }
    }

    public function LoginAnggota()
    {
        $data = [
            'judul' => 'Login Anggota',
            'page' => 'v_login_anggota',
        ];
        return view('v_template_login', $data);
    }

    public function LogOut()
    {
        session()->remove('nama_user');
        session()->remove('email');
        session()->remove('level');
        session()->setFlashdata('pesan', 'Logout Sukses !');
        return redirect()->to(base_url('Auth/LoginUser'));
    }

    public function Register()
    {
        $data = [
            'judul' => 'Register',
            'page' => 'v_register',
        ];
        return view('v_template_login', $data);
    }

    public function Daftar()
    {
        // Jika tervalidasi
        if ($this->validate([
            'nim' => [
                'label' => 'NIM',
                'rules' => 'required|is_unique[tbl_anggota.nim]',
                'errors' => [
                    'required' => '{field} Masih Kosong!',
                    'is_unique' => '{field} NIM Sudah Terdaftar!',
                ]
            ],
            'nama' => [
                'label' => 'Nama',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Masih Kosong!',
                ]
            ],
            'jenis_kelamin' => [
                'label' => 'Jenis Kelamin',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Masih Kosong!',
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Masih Kosong!',
                ]
            ],
            'ulangi_password' => [
                'label' => 'Ulangi Password',
                'rules' => 'required|matches[password]',
                'errors' => [
                    'required' => '{field} Masih Kosong!',
                    'matches' => 'Password Tidak Cocok!',
                ]
            ],
        ])) {
            $data = [
                'nim' => $this->request->getPost('nim'),
                'nama' => $this->request->getPost('nama'),
                'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
                'password' => $this->request->getPost('password')
            ];
            $this->ModelAuth->Daftar($data);
            session()->setFlashdata('pesan', 'Register Berhasil, Silahkan Login!', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('Auth/Register'))->withInput('validation', \Config\Services::validation());
        } else {
            // Jika tidak tervalidasi
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('Auth/Register'))->withInput('validation', \Config\Services::validation());
        }
    }

    public function CekLoginAnggota()
    {
        if ($this->validate([
            'nim' => [
                'label' => 'NIM',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Masih Kosong!',
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Masih Kosong!',
                ]
            ],
        ])) {
            // Jika entry valid
            $nim = $this->request->getPost('nim');
            $password = $this->request->getPost('password');
            $cek_login = $this->ModelAuth->LoginAnggota($nim, $password);
            if ($cek_login) {
                // Jika login berhasil
                session()->set('nama', $cek_login['nama']);
                session()->set('nim', $cek_login['nim']);
                session()->set('level', 'Anggota');
                return redirect()->to(base_url('Anggota'));
            } else {
                // Jika login gagal
                session()->setFlashdata('pesan', 'NIM Atau Password Salah !');
                return redirect()->to(base_url('Auth/LoginAnggota'));
            }
        } else {
            // Jika entry tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('Auth/LoginAnggota'));
        }
    }
}
