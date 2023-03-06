<?php

namespace App\Models;

use CodeIgniter\Model;

class PenggunaModel extends Model
{
    protected $table           = 'tb_user';
    protected $primaryKey      = 'id_user';
    protected $allowedFields   = [
        "nama_pengguna",
        "username",
        "password",
        "id_outlet",
        "role"
    ];

    // Pengecekan Login
    // public function loginCheck($table, $data)
    // {
    //     $db = db_connect();

    //     $data = $db->query("SELECT * FROM $table where username='$data[username]' AND password='$data[password]'");

    //     return $data;
    // }

    public function getOutlet()
    {
        $builder = $this->db->table('tb_user');
        $builder->select('*');
        $builder->join('tb_outlet', 'tb_outlet.id_outlet = tb_user.id_outlet', 'left');
        return $builder->get();
    }

    public function getPengguna()
    {
        $builder = $this->db->table('tb_user');
        return $builder->get();
    }

    public function savePengguna($data)
    {
        $query = $this->db->table('tb_user')->insert($data);
        return $query;
    }

    public function updatePengguna($data, $id)
    {
        $query = $this->db->table('tb_user')->update($data, array('id_user' => $id));
        return $query;
    }

    public function deletePengguna($id)
    {
        $query = $this->db->table('tb_user')->delete(array('id_user' => $id));
        return $query;
    }
}
