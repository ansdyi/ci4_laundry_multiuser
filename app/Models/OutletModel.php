<?php

namespace App\Models;

use CodeIgniter\Model;

class OutletModel extends Model
{
    protected $table           = 'tb_outlet';
    protected $primaryKey      = 'id_outlet ';
    protected $allowedFields   = [
        "nama_outlet",
        "alamat_outlet",
        "no_tlp",
    ];

    public function getOutlet()
    {
        $builder = $this->db->table('tb_outlet');
        return $builder->get();
    }

    public function saveOutlet($data)
    {
        $query = $this->db->table('tb_outlet')->insert($data);
        return $query;
    }

    public function updateOutlet($data, $id)
    {
        $query = $this->db->table('tb_outlet')->update($data, array('id_outlet' => $id));
        return $query;
    }

    public function deleteOutlet($id)
    {
        $query = $this->db->table('tb_outlet')->delete(array('id_outlet' => $id));
        return $query;
    }
}
