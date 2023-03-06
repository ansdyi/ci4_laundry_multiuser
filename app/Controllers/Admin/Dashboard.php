<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PenggunaModel;
use App\Models\PaketModel;
use App\Models\PelangganModel;
use App\Models\TransaksiModel;


class Dashboard extends BaseController
{
    function __construct()
    {
        $this->pelanggan = new PelangganModel();
        $this->transaksi = new TransaksiModel();
        $this->pengguna = new PenggunaModel();
        $this->paket = new PaketModel();
        
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
            'title' => "Admin Dashboard | My Laundry",
            'header' => "Dashboard",
        ];

        $data['pelanggan'] = $this->pelanggan->countAll();
        $data['transaksi'] = $this->transaksi->countAll();
        $data['pengguna'] = $this->pengguna->countAll();
        $data['paket'] = $this->paket->countAll();

        $data['page'] = view('admin/v_dashboard', $data);

        echo view("admin/v_homepage", $data);
    }
}
