<?php

namespace App\Controllers\Kasir;

use App\Controllers\BaseController;
use App\Models\OutletModel;
use App\Models\PelangganModel;
use App\Models\PenggunaModel;
use App\Models\TransaksiModel;
use App\Models\PaketModel;


class Transaksi extends BaseController
{
    function __construct()
    {
        $this->outlet = new OutletModel();
        $this->pengguna = new PenggunaModel();
        $this->pelanggan = new PelangganModel();
        $this->paket = new PaketModel();
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
            'title' => "Kasir Transaksi | My Laundry",
            'header' => "Data Transaksi",
            'cardtitle' => "Tabel Transaksi",
            'cardtitlestat' => "Tabel Status Transaksi",
            'inputtitle' => "Form Input Data Transaksi",
            'updatetitle' => "Form Update Data Transaksi",
            'deletetitle' => "Delete Data Transaksi",
        ];

        $data['outlet']  = $this->outlet->getOutlet()->getResult();
        $data['pelanggan']  = $this->pelanggan->getPelanggan()->getResult();
        $data['pengguna']  = $this->pengguna->getPengguna()->getResult();
        $data['transaksi']  = $this->transaksi->getTransaksiByAllId()->getResult();
        $data['paket'] =  $this->paket->getPaket()->getResult();

        $data['transaksicount'] = $this->transaksi->countAll();

        $data['page'] = view('kasir/v_transaksi', $data);

        echo view("kasir/v_homepage", $data);
    }

    public function save()
    {
        $data = array(
            'id_outlet'        => session()->get('id_outlet'),
            'kode_invoice'     => $this->request->getPost('kode_invoice'),
            'id_member'        => $this->request->getPost('id_member'),
            'tgl_transaksi'    => $this->request->getPost('tgl_transaksi'),
            'batas_waktu'      => $this->request->getPost('batas_waktu'),
            'tgl_bayar'        => $this->request->getPost('tgl_bayar'),
            'biaya_tambahan'   => $this->request->getPost('biaya_tambahan'),
            'diskon'           => $this->request->getPost('diskon'),
            'pajak'            => $this->request->getPost('pajak'),
            'status_transaksi' => $this->request->getPost('status_transaksi'),
            'status_bayar'     => $this->request->getPost('status_bayar'),
            'id_user'          => session()->get('id_user'),
            'id_paket'         => $this->request->getPost('id_paket'),
            'qty'              => $this->request->getPost('qty'),
            'keterangan'       => $this->request->getPost('keterangan')
        );
        $this->transaksi->saveTransaksi($data);
        session()->setFlashdata('title', 'Great!');
        return redirect()->back()
            ->with('text', 'New Data Transaksi was Saved!');
    }

    public function update()
    {
        $id = $this->request->getPost('id_transaksi');

        $data = array(
            'kode_invoice'     => $this->request->getPost('kode_invoice'),
            'id_member'        => $this->request->getPost('id_member'),
            'tgl_bayar'        => $this->request->getPost('tgl_bayar'),
            'status_transaksi' => $this->request->getPost('status_transaksi'),
            'status_bayar'     => $this->request->getPost('status_bayar'),
        );
        $this->transaksi->updateTransaksi($data, $id);
        session()->setFlashdata('title', 'Great!');
        return redirect()->back()
            ->with('text', 'Data Transaksi was Updated!');
    }

    public function delete()
    {
        $id = $this->request->getPost('id_transaksi');

        $this->transaksi->deleteTransaksi($id);
        session()->setFlashdata('title', 'Great!');
        return redirect()->back()
            ->with('text', 'New Data Transaksi was Deleted!');
    }

    public function autocode(){
        return json_encode($this->transaksi->generateCode());
    }
}
