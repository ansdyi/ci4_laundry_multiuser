<?php

namespace App\Controllers\Owner;

use App\Controllers\BaseController;
use App\Models\PenggunaModel;
use App\Models\OutletModel;
use App\Models\PaketModel;
use App\Models\PelangganModel;
use App\Models\TransaksiModel;


class Dashboard extends BaseController
{
    function __construct()
    {
        $this->outlet = new OutletModel();
        $this->pengguna = new PenggunaModel();
        $this->pelanggan = new PelangganModel();
        $this->paket = new PaketModel();
        $this->transaksi = new TransaksiModel();
        
        if (session()->get('role') != "Owner") {
            echo '<script>
            alert("Access Denied!");
            </script>';
            exit;
        }
    }

    public function index()
    {
        $data = [
            'title' => "Owner Dashboard | My Laundry",
            'header' => "Dashboard",
            'info' => "For more info, please Sign In as Admin Role 😉",
        ];

        $data['outlet'] = $this->outlet->countAll();
        $data['paket'] = $this->paket->countAll();
        $data['pelanggan'] = $this->pelanggan->countAll();
        $data['pengguna'] = $this->pengguna->countAll();
        $data['transaksi'] = $this->transaksi->countAll();

        $data['page'] = view('owner/v_dashboard', $data);

        echo view("owner/v_homepage", $data);
    }
}
