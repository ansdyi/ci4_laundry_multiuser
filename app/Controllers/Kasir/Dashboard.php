<?php

namespace App\Controllers\Kasir;

use App\Controllers\BaseController;
use App\Models\PelangganModel;
use App\Models\TransaksiModel;


class Dashboard extends BaseController
{
    function __construct()
    {
        $this->pelanggan = new PelangganModel();
        $this->transaksi = new TransaksiModel();
        
        if (session()->get('role') != "Kasir") {
            echo '<script>
            alert("Access Denied!");
            </script>';
            exit;
        }
    }

    public function index()
    {
        $data = [
            'title' => "Kasir Dashboard | My Laundry",
            'header' => "Dashboard",
        ];

        $data['pelanggan'] = $this->pelanggan->countAll();
        $data['transaksi'] = $this->transaksi->countAll();

        $data['page'] = view('kasir/v_dashboard', $data);

        echo view("kasir/v_homepage", $data);
    }
}
