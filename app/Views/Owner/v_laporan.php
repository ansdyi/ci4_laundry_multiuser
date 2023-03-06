<style>
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width:
            100%;
    }

    td,
    th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #dddddd;
    }
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?= $header; ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('owner/dashboard') ?>">Homepage</a></li>
                        <li class="breadcrumb-item active"><?= $header; ?></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box Update -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><?= $cardtitle; ?></h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>

            </div>
            <div class="card-body">
                <?php
                echo anchor('owner/laporan/generatepdf', 'Generate PDF Report') . '<p/>';

                $table = new \CodeIgniter\View\Table();

                $table->setHeading('Kode Invoice', 'Nama Pelanggan', 'Tanggal Bayar', 'Status Transaksi', 'Status Bayar');

                foreach ($transaksi as $item) :
                    $table->addRow($item->kode_invoice, $item->nama_pelanggan, $item->tgl_bayar, $item->status_transaksi, $item->status_bayar);
                endforeach;

                echo $table->generate();
                ?>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <?= $transaksicount; ?> Total Data
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>