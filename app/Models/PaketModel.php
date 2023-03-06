<?php

namespace App\Models;

use CodeIgniter\Model;

class PaketModel extends Model
{
    protected $table           = 'tb_paket';
    protected $primaryKey      = 'id_paket';
    protected $allowedFields   = [
        "id_outlet",
        "jenis_paket",
        "nama_paket",
        "harga"
    ];

    public function getOutlet()
    {
        $builder = $this->db->table('tb_paket');
        $builder->select('*');
        $builder->join('tb_outlet', 'tb_outlet.id_outlet = tb_paket.id_outlet', 'left');
        return $builder->get();
    }

    public function getPaket()
    {
        $builder = $this->db->table('tb_paket');
        return $builder->get();
    }

    public function savePaket($data)
    {
        $query = $this->db->table('tb_paket')->insert($data);
        return $query;
    }

    public function updatePaket($data, $id)
    {
        $query = $this->db->table('tb_paket')->update($data, array('id_paket' => $id));
        return $query;
    }

    public function deletePaket($id)
    {
        $query = $this->db->table('tb_paket')->delete(array('id_paket' => $id));
        return $query;
    }
}
