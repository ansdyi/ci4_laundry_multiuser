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
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard') ?>">Homepage</a></li>
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
                            <th>No</th>
                            <th>Nama Outlet</th>
                            <th>Jenis Paket</th>
                            <th>Nama Paket</th>
                            <th>Harga</th>
                            <th class="bg-secondary">Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($paket as $item) : ?>
                            <tr>
                                <td><?= $i ?></td>
                                <td><?= $item->nama_outlet; ?></td>
                                <td><?= $item->jenis_paket; ?></td>
                                <td><?= $item->nama_paket; ?></td>
                                <td><?= $item->harga; ?></td>
                                <td class="text-center">
                                    <button class="btn-warning btn-edit-paket" data-id="<?= $item->id_paket; ?>" data-outlet="<?= $item->id_outlet; ?>" data-jenis="<?= $item->jenis_paket; ?>" data-nama="<?= $item->nama_paket; ?>" data-harga="<?= $item->harga; ?>">
                                        <i class="nav-icon fas fa-pen" aria-hidden="true"></i>
                                    </button>

                                    <button class="btn-danger btn-delete-paket" data-id="<?= $item->id_paket; ?>">
                                        <i class="nav-icon fas fa-trash" aria-hidden="true"></i>
                                    </button>
                                </td>
                            </tr>
                        <?php
                            $i++;
                        endforeach; ?>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <?= $paketcount; ?> Total Data
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

        <!-- Modal Create Data -->
        <form class="form-horizontal" action="<?php echo base_url('admin/paket/save') ?>" method="post">
            <div class="modal fade" id="inputData">
                <div class="modal-dialog">
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
                                    <label for="namaOutlet" class="col-sm-4 col-form-label">Nama Outlet</label>
                                    <div class="col-sm-8">
                                        <select class="form-control" id="namaOutlet" name="id_outlet" required>
                                            <option value="">- Pilih Nama Outlet -</option>
                                            <?php foreach ($outlet as $item) : ?>
                                                <option value="<?= $item->id_outlet; ?>"><?= $item->nama_outlet; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="jenisPaket" class="col-sm-4 col-form-label">Jenis Paket</label>
                                    <div class="col-sm-8">
                                        <select class="form-control" id="jenisPaket" name="jenis_paket" required>
                                            <option value="">- Pilih Jenis Paket -</option>
                                            <option value="Kiloan">Kiloan</option>
                                            <option value="Selimut">Selimut</option>
                                            <option value="Bed Cover">Bed Cover</option>
                                            <option value="Kaos">Kaos</option>
                                            <option value="Lain">Lain</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="namaPaket" class="col-sm-4 col-form-label">Nama Paket</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="namaPaket" placeholder="Nama Paket" name="nama_paket" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="hargaPaket" class="col-sm-4 col-form-label">Harga</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" id="hargaPaket" placeholder="Harga" name="harga" required>
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
        <form class="form-horizontal" action="<?php echo base_url('admin/paket/update') ?>" method="post">
            <div class="modal fade" id="updateData">
                <div class="modal-dialog">
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
                                    <label for="namaOutlet" class="col-sm-4 col-form-label">Nama Outlet</label>
                                    <div class="col-sm-8">
                                        <select class="form-control id_outlet" id="namaOutlet" name="id_outlet" required>
                                            <option value="">- Pilih Nama Outlet -</option>
                                            <?php foreach ($outlet as $item) : ?>
                                                <option value="<?= $item->id_outlet; ?>"><?= $item->nama_outlet; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="jenisPaket" class="col-sm-4 col-form-label">Jenis Paket</label>
                                    <div class="col-sm-8">
                                        <select class="form-control jenis_paket" id="jenisPaket" name="jenis_paket" required>
                                            <option value="">- Pilih Jenis Paket -</option>
                                            <option value="Kiloan">Kiloan</option>
                                            <option value="Selimut">Selimut</option>
                                            <option value="Bed Cover">Bed Cover</option>
                                            <option value="Kaos">Kaos</option>
                                            <option value="Lain">Lain</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="namaPaket" class="col-sm-4 col-form-label">Nama Paket</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control nama_paket" id="namaPaket" placeholder="Nama Paket" name="nama_paket" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="hargaPaket" class="col-sm-4 col-form-label">Harga</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control harga" id="hargaPaket" placeholder="Harga" name="harga" required>
                                    </div>
                                </div>

                            </div>
                            <!-- /.card-body -->
                        </div>
                        <div class="modal-footer justify-content-between">
                            <input type="hidden" name="id_paket" class="id_paket">
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
        <form class="form-horizontal" action="<?php echo base_url('admin/paket/delete') ?>" method="post">
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
                            <input type="hidden" name="id_paket" class="id_paket">
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