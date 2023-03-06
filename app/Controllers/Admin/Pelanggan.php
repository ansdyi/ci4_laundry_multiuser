<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PelangganModel;

class Pelanggan extends BaseController
{
    function __construct()
    {
        $this->pelanggan = new PelangganModel();

        if (session()->get('role') != "Admin") {
            echo '<script>
            alert("Access Denied!");
            </script>';
            exit;
        }
    }

    public function index()
    {
        $data = [
            'title' => "Admin Pelanggan | My Laundry",
            'header' => "Data Pelanggan",
            'cardtitle' => "Tabel Pelanggan",
            'inputtitle' => "Form Input Data Pelanggan",
            'updatetitle' => "Form Update Data Pelanggan",
            'deletetitle' => "Delete Data Pelanggan",
        ];

        $data['pelanggan']  = $this->pelanggan->getPelanggan()->getResult();

        $data['pelanggancount'] = $this->pelanggan->countAll();

        $data['page'] = view('admin/v_pelanggan', $data);

        echo view("admin/v_homepage", $data);
    }

    public function save()
    {
        $data = array(
            'nama_pelanggan'   => $this->request->getPost('nama_pelanggan'),
            'alamat_pelanggan' => $this->request->getPost('alamat_pelanggan'),
            'jenis_kelamin'    => $this->request->getPost('jenis_kelamin'),
            'no_tlp'           => $this->request->getPost('no_tlp'),
        );
        $this->pelanggan->savePelanggan($data);
        session()->setFlashdata('title', 'Great!');
        return redirect()->back()
            ->with('text', 'New Data Pelanggan was Saved!');
    }

    public function update()
    {
        $id = $this->request->getPost('id_member');
        $data = array(
            'nama_pelanggan'   => $this->request->getPost('nama_pelanggan'),
            'alamat_pelanggan' => $this->request->getPost('alamat_pelanggan'),
            'jenis_kelamin'    => $this->request->getPost('jenis_kelamin'),
            'no_tlp'           => $this->request->getPost('no_tlp'),
        );
        $this->pelanggan->updatePelanggan($data, $id);
        session()->setFlashdata('title', 'Great!');
        return redirect()->back()
            ->with('text', 'Data Pelanggan was Updated!');
    }

    public function delete()
    {
        $id = $this->request->getPost('id_member');

        $this->pelanggan->deletePelanggan($id);
        session()->setFlashdata('title', 'Great!');
        return redirect()->back()
            ->with('text', 'New Data Pelanggan was Deleted!');
    }
}
