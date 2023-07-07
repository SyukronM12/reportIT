<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelLaporan extends Model
{
    public function AllData() {
        return $this->db->table('laporan')->orderBy('id_laporan', 'DESC')->get()->getResultArray();
    }

    public function ViewData($id) {
        return $this->db->table('laporan')->where('id_laporan',$id)->orderBy('id_laporan', 'DESC')->get()->getResultArray();
    }

    public function createData($data){
        $this->db->table('laporan')->insert($data);
    }

    public function updateData($id, $data){
        $builder = $this->db->table('laporan');
        $builder->where('id_laporan', $id);
        $builder->update($data);
    }

    public function deleteData($id){
        $builder = $this->db->table('laporan');
        $builder->where('id_laporan', $id);
        $builder->delete();
    }
}
