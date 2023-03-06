<?php

namespace App\Models;

use CodeIgniter\Model;

class PelangganModel extends Model
{
    protected $table           = 'tb_member';
    protected $primaryKey      = 'id_member';
    protected $allowedFields   = [
        "nama_pelanggan",
        "alamat_pelanggan",
        "jenis_kelamin",
        "no_tlp"
    ];

    public function getPelanggan()
    {
        $builder = $this->db->table('tb_member');
        return $builder->get();
    }

    public function savePelanggan($data)
    {
        $query = $this->db->table('tb_member')->insert($data);
        return $query;
    }

    public function updatePelanggan($data, $id)
    {
        $query = $this->db->table('tb_member')->update($data, array('id_member' => $id));
        return $query;
    }

    public function deletePelanggan($id)
    {
        $query = $this->db->table('tb_member')->delete(array('id_member' => $id));
        return $query;
    }
}
