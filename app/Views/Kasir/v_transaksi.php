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
                        <li class="breadcrumb-item"><a href="<?= base_url('kasir/dashboard') ?>">Homepage</a></li>
                        <li class="breadcrumb-item active"><?= $header; ?></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><?= $cardtitle; ?></h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>

                <div class="mt-4">
                    <button type="button" class="btn-info btn-sm" data-toggle="modal" data-target="#inputData">
                        <i class="fa fa-plus" aria-hidden="true"></i> Create New One
                    </button>
                </div>
            </div>
            <div class="card-body table-responsive p-0" style="height: 300px;">
                <table class="table table-bordered table-head-fixed text-nowrap">
                    <thead class="text-center">
                        <tr>
                            <th class="bg-secondary">Option</th>
                            <th>Kode Invoice</th>
                            <th>Tanggal Transaksi</th>
                            <th>Batas Waktu</th>
                            <th>Nama Pelanggan</th>
                            <th>Nama Paket</th>
                            <th>Keterangan</th>
                            <th>Quantity</th>
                            <th>Biaya Tambahan</th>
                            <th>Diskon</th>
                            <th>Pajak</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($transaksi as $item) : ?>
                            <tr>
                                <td class="text-center">
                                    <button class="btn-warning btn-update-transaksi" data-id="<?= $item->id_transaksi; ?>" data-inv="<?= $item->kode_invoice; ?>" data-id_member="<?= $item->id_member; ?>" data-tglbayar="<?= $item->tgl_bayar; ?>" data-stattransaksi="<?= $item->status_transaksi; ?>" data-statbayar="<?= $item->status_bayar; ?>">
                                        <i class="nav-icon fas fa-pen" aria-hidden="true"></i>
                                    </button>

                                    <button class="btn-danger btn-delete-transaksi" data-id="<?= $item->id_transaksi; ?>">
                                        <i class="nav-icon fas fa-trash" aria-hidden="true"></i>
                                    </button>
                                </td>
                                <td><?= $item->kode_invoice; ?></td>
                                <td><?= $item->tgl_transaksi; ?></td>
                                <td><?= $item->batas_waktu; ?></td>
                                <td><?= $item->nama_pelanggan; ?></td>
                                <td><?= $item->nama_paket; ?></td>
                                <td><?= $item->keterangan; ?></td>
                                <td><?= $item->qty; ?></td>
                                <td><?= $item->biaya_tambahan; ?></td>
                                <td><?= $item->diskon; ?></td>
                                <td><?= $item->pajak; ?></td>
                            </tr>
                        <?php
                        endforeach; ?>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <?= $transaksicount; ?> Total Data
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

        <!-- Default box Update -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><?= $cardtitlestat; ?></h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>

            </div>
            <div class="card-body table-responsive p-0" style="height: 300px;">
                <table class="table table-bordered table-head-fixed text-nowrap">
                    <thead class="text-center">
                        <tr>
                            <th>No</th>
                            <th>Kode Invoice</th>
                            <th>Nama Pelanggan</th>
                            <th>Tanggal Bayar</th>
                            <th>Status Transaksi</th>
                            <th>Status Bayar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($transaksi as $item) : ?>
                            <tr>
                                <td><?= $i ?></td>
                                <td><?= $item->kode_invoice; ?></td>
                                <td><?= $item->nama_pelanggan; ?></td>
                                <td><?= $item->tgl_bayar; ?></td>
                                <td><?= $item->status_transaksi; ?></td>
                                <td><?= $item->status_bayar; ?></td>
                            </tr>
                        <?php
                            $i++;
                        endforeach; ?>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <?= $transaksicount; ?> Total Data
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

        <!-- Modal Create Data -->
        <form class="form-horizontal" action="<?php echo base_url('kasir/transaksi/save') ?>" method="post">
            <div class="modal fade" id="inputData" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title"><?= $inputtitle; ?></h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- Card Body Input -->
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="namaPengguna" class="col-sm-4 col-form-label">Nama Pengguna</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="namaPengguna" name="id_pengguna" value="<?= session()->get('nama_pengguna'); ?>" readonly="readonly">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="namaOutlet" class="col-sm-4 col-form-label">Id Outlet</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="namaOutlet" name="id_outlet" value="<?= session()->get('id_outlet'); ?>" readonly="readonly">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="kdInvoice" class="col-sm-4 col-form-label">Kode Invoice</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="kdInvoice" name="kode_invoice" readonly="readonly">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="tglTransaksi" class="col-sm-4 col-form-label">Tanggal Transaksi</label>
                                    <div class="col-sm-8">
                                        <input type="datetime-local" class="form-control" id="tglTransaksi" placeholder="Tanggal Transaksi" name="tgl_transaksi" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="batasWaktu" class="col-sm-4 col-form-label">Batas Waktu</label>
                                    <div class="col-sm-8">
                                        <input type="datetime-local" class="form-control" id="batasWaktu" placeholder="Batas Waktu" name="batas_waktu" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="namaPelanggan" class="col-sm-4 col-form-label">Nama Pelanggan</label>
                                    <div class="col-sm-8">
                                        <select class="form-control" id="namaPelanggan" name="id_member" required>
                                            <option value="">- Pilih Nama Pelanggan -</option>
                                            <?php foreach ($pelanggan as $item) : ?>
                                                <option value="<?= $item->id_member; ?>"><?= $item->nama_pelanggan; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="namaPaket" class="col-sm-4 col-form-label">Nama Paket</label>
                                    <div class="col-sm-8">
                                        <select class="form-control" id="namaPaket" name="id_paket" required>
                                            <option value="">- Pilih Nama Paket -</option>
                                            <?php foreach ($paket as $item) : ?>
                                                <option value="<?= $item->id_paket; ?>"><?= $item->nama_paket; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="ketTrans" class="col-sm-4 col-form-label">Keterangan</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="ketTrans" placeholder="Keterangan" name="keterangan" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="quantityTrans" class="col-sm-4 col-form-label">Quantity</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" id="quantityTrans" placeholder="Quantity" name="qty" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="biayaTambahan" class="col-sm-4 col-form-label">Biaya Tambahan</label>
                                    <div class="col-sm-8 input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Rp.</span>
                                        </div>
                                        <input type="number" class="form-control" id="biayaTambahan" placeholder="Biaya Tambahan" name="biaya_tambahan" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="diskonTransaksi" class="col-sm-4 col-form-label">Diskon</label>
                                    <div class="col-sm-8 input-group">
                                        <input type="number" class="form-control" id="diskonTransaksi" placeholder="Diskon" name="diskon" />
                                        <div class="input-group-append">
                                            <span class="input-group-text">%</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="pajakTransaksi" class="col-sm-4 col-form-label">Pajak</label>
                                    <div class="col-sm-8 input-group">
                                        <input type="number" class="form-control" id="pajakTransaksi" placeholder="Pajak" name="pajak" />
                                        <div class="input-group-append">
                                            <span class="input-group-text">%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
        </form>
        <!-- /.modal -->

        <!-- Modal Update Data -->
        <form class="form-horizontal" action="<?php echo base_url('kasir/transaksi/update') ?>" method="post">
            <div class="modal fade" id="updateData" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title"><?= $updatetitle; ?></h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- Card Body Input -->
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="kdInvoiceUp" class="col-sm-4 col-form-label">Kode Invoice</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control kode_invoice" id="kdInvoiceUp" name="kode_invoice" readonly="readonly">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="namaPelanggan" class="col-sm-4 col-form-label">Id Pelanggan</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control id_member" id="namaPelanggan" name="id_member" readonly="readonly">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="tglBayar" class="col-sm-4 col-form-label">Tanggal Bayar</label>
                                    <div class="col-sm-8">
                                        <input type="datetime-local" class="form-control tgl_bayar" id="tglBayar" placeholder="Tanggal Bayar" name="tgl_bayar" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="statusTransaksi" class="col-sm-4 col-form-label">Status Transaksi</label>
                                    <div class="col-sm-8">
                                        <select class="form-control status_transaksi" id="statusTransaksi" name="status_transaksi" required>
                                            <option value="">- Pilih Status Transaksi -</option>
                                            <option value="Baru">Baru</option>
                                            <option value="Proses">Proses</option>
                                            <option value="Selesai">Selesai</option>
                                            <option value="Diambil">Diambil</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="statusBayar" class="col-sm-4 col-form-label">Status Bayar</label>
                                    <div class="col-sm-8">
                                        <select class="form-control status_bayar" id="statusBayar" name="status_bayar" required>
                                            <option value="">- Pilih Status Bayar -</option>
                                            <option value="Dibayar">Dibayar</option>
                                            <option value="Belum Dibayar">Belum Dibayar</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <div class="modal-footer justify-content-between">
                            <input type="hidden" name="id_transaksi" class="id_transaksi">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
        </form>
        <!-- /.modal -->

        <!-- Modal Delete Data -->
        <form class="form-horizontal" action="<?php echo base_url('kasir/transaksi/delete') ?>" method="post">
            <div class="modal fade" id="deleteData">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title"><?= $deletetitle; ?></h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- Card Body Verification -->
                            <div class="card-body">
                                <h6>Are you sure want to delete this data?😡</h6>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <div class="modal-footer justify-content-between">
                            <input type="hidden" name="id_transaksi" class="id_transaksi">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                            <button type="submit" class="btn btn-primary">Yes</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
        </form>
        <!-- /.modal -->

    </section>
    <!-- /.content -->
</div>