<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelLaporan;

class Laporan extends BaseController
{

    public function __construct()
    {
        helper('form');
        $this->ModelLaporan = new ModelLaporan;
    }

    public function index()
    {
        $data = [
            'judul' => 'Laporan',
            'page' => 'v_laporan',
            'laporan' => $this->ModelLaporan->AllData(),
        ];
        return view('v_template_admin', $data);
    }

    public function TampilLaporan(){
        $data = [
            'judul' => 'Laporan',
            'page' => 'v_laporan',
            'laporan' => $this->ModelLaporan->AllData(),
        ];
        return view('v_template_admin', $data);
    }

    public function BuatLaporan()
    {
        $data = [
            'judul' => 'Buat Laporan',
            'page' => 'v_buat_laporan',
        ];
        return view('v_template_anggota', $data);
    }

    public function InsertLaporan()
    {
        if($this->validate([
            'nim' => 'required',
            'nama' => 'required',
            'jenis_kerusakan' => 'required',
            'foto' => 'uploaded[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]|max_size[foto,2048]',
            'keterangan' => 'required'
        ])){

            // Dapatkan data yang dikirimkan dari form
            $nim = $this->request->getPost('nim');
            $nama = $this->request->getPost('nama');
            $jenisKerusakan = $this->request->getPost('jenis_kerusakan');
            $keterangan = $this->request->getPost('keterangan');
        
            // Proses upload file foto
            $foto = $this->request->getFile('foto');
            if ($foto->isValid() && !$foto->hasMoved()) {
                $newName = $foto->getRandomName();
                $foto->move('laporan/', $newName);
                // Simpan nama file foto ke database (misalnya kolom 'foto' dalam tabel)
                $namaFoto = $newName;
            }
        
            // Simpan data ke database
            $data = [
                'nim' => $nim,
                'nama' => $nama,
                'jenis_kerusakan' => $jenisKerusakan,
                'keterangan' => $keterangan,
                'foto' => $namaFoto
            ];
             // Ganti dengan model Anda yang sesuai
            $this->ModelLaporan->createData($data);
        
            // Redirect ke halaman sukses
            return redirect()->to(base_url('Laporan/TampilLaporan'));
        } else {
            // Jika entry tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('Laporan/BuatLaporan'));
        }
    }

    public function Acc($id)
    {
        $data = [
            'judul' => 'Laporan',
            'page' => 'v_laporan',
        ];
        $kirimUpdate = [
            'status' => 'Acc',
        ];
        $this->ModelLaporan->updateData($id,$kirimUpdate);
        return redirect()->to(base_url('Laporan'));
    }

    public function View($id)
    {
        $data = [
            'judul' => 'Laporan',
            'page' => 'v_detail_laporan',
            'detail' => $this->ModelLaporan->viewData($id),
            
        ];
        return view('v_template_admin', $data);
    }

    public function Delete($id)
    {
        $this->ModelLaporan->deleteData($id);
        return redirect()->to(base_url('Laporan/TampilLaporan'));
    }
}
