<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\OutletModel;

class Outlet extends BaseController
{
    function __construct()
    {
        $this->outlet = new OutletModel();

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
            'title' => "Admin Outlet | My Laundry",
            'header' => "Data Outlet",
            'cardtitle' => "Tabel Outlet",
            'inputtitle' => "Form Input Data Outlet",
            'updatetitle' => "Form Update Data Outlet",
            'deletetitle' => "Delete Data Outlet",
        ];

        $data['outlet']  = $this->outlet->getOutlet()->getResult();

        $data['outletcount'] = $this->outlet->countAll();

        $data['page'] = view('admin/v_outlet', $data);

        echo view("admin/v_homepage", $data);
    }

    public function save()
    {
        $data = array(
            'nama_outlet'    => $this->request->getPost('nama_outlet'),
            'alamat_outlet'  => $this->request->getPost('alamat_outlet'),
            'no_tlp'         => $this->request->getPost('no_tlp'),
        );
        $this->outlet->saveOutlet($data);
        session()->setFlashdata('title', 'Great!');
        return redirect()->back()
            ->with('text', 'New Data Outlet was Saved!');
    }

    public function update()
    {
        $id = $this->request->getPost('id_outlet');
        $data = array(
            'nama_outlet'    => $this->request->getPost('nama_outlet'),
            'alamat_outlet'  => $this->request->getPost('alamat_outlet'),
            'no_tlp'         => $this->request->getPost('no_tlp'),
        );
        $this->outlet->updateOutlet($data, $id);
        session()->setFlashdata('title', 'Great!');
        return redirect()->back()
            ->with('text', 'Data Outlet was Updated!');
    }

    public function delete()
    {
        $id = $this->request->getPost('id_outlet');

        $this->outlet->deleteOutlet($id);
        session()->setFlashdata('title', 'Great!');
        return redirect()->back()
            ->with('text', 'New Data Outlet was Deleted!');
    }
}
