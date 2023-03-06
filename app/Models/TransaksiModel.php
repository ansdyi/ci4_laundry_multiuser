<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
{
    protected $table           = 'tb_transaksi';
    protected $primaryKey      = 'id_transaksi';
    protected $allowedFields   = [
        "id_outlet",
        "kode_invoice",
        "id_member",
        "tgl_transaksi",
        "batas_waktu",
        "tgl_bayar",
        "biaya_tambahan",
        "diskon",
        "pajak",
        "status_transaksi",
        "status_bayar",
        "id_user",
        "id_paket",
        "qty",
        "keterangan	",
    ];

    public function getTransaksiByAllId()
    {
        $builder = $this->db->table('tb_transaksi');
        $builder->select('*');
        $builder->join('tb_outlet', 'tb_outlet.id_outlet = tb_transaksi.id_outlet', 'left');
        $builder->join('tb_member', 'tb_member.id_member = tb_transaksi.id_member', 'left');
        $builder->join('tb_user', 'tb_user.id_user = tb_transaksi.id_user', 'left');
        $builder->join('tb_paket', 'tb_paket.id_paket = tb_transaksi.id_paket', 'left');
        return $builder->get();
    }

    public function getTransaksi()
    {
        $builder = $this->db->table('tb_transaksi');
        return $builder->get();
    }

    public function saveTransaksi($data)
    {
        $query = $this->db->table('tb_transaksi')->insert($data);
        return $query;
    }

    public function updateTransaksi($data, $id)
    {
        $query = $this->db->table('tb_transaksi')->update($data, array('id_transaksi' => $id));
        return $query;
    }

    public function deleteTransaksi($id)
    {
        $query = $this->db->table('tb_transaksi')->delete(array('id_transaksi' => $id));
        return $query;
    }

    public function generateCode()
    {
        $builder = $this->table('tb_transaksi');
        $builder->selectMax('kode_invoice', 'invMax');
        $query = $builder->get()->getResult();
        $kd = '';

        if ($query > 0) {
            foreach ($query as $key) {
                if (substr($key->invMax, 3, -4) == date('dmy')) {
                    $getcode = substr($key->invMax, -4);
                    $counter = (intval($getcode)) + 1;
                    $kd = sprintf('%04s', $counter);
                } else {
                    $kd = '0001';
                }
            }
        } else {
            $kd = '0001';
        }

        return 'INV' . date('dmy') . $kd;
    }
}
