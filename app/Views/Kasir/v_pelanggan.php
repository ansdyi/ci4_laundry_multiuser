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
                            <th>No</th>
                            <th>Nama Pelanggan</th>
                            <th>Alamat Pelanggan</th>
                            <th>Jenis Kelamin</th>
                            <th>No Telepon</th>
                            <th class="bg-secondary">Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($pelanggan as $item) : ?>
                            <tr>
                                <td><?= $i ?></td>
                                <td><?= $item->nama_pelanggan; ?></td>
                                <td><?= $item->alamat_pelanggan; ?></td>
                                <td><?= $item->jenis_kelamin; ?></td>
                                <td><?= $item->no_tlp; ?></td>
                                <td class="text-center">
                                    <button class="btn-warning btn-edit-pelanggan" data-id="<?= $item->id_member; ?>" data-nama="<?= $item->nama_pelanggan; ?>" data-alamat="<?= $item->alamat_pelanggan; ?>" data-jenis="<?= $item->jenis_kelamin; ?>" data-tlp="<?= $item->no_tlp; ?>">
                                        <i class="nav-icon fas fa-pen" aria-hidden="true"></i>
                                    </button>

                                    <button class="btn-danger btn-delete-pelanggan" data-id="<?= $item->id_member; ?>">
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
                <?= $pelanggancount; ?> Total Data
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

        <!-- Modal Create Data -->
        <form class="form-horizontal" action="<?php echo base_url('kasir/pelanggan/save') ?>" method="post">
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
                                    <label for="namaPelanggan" class="col-sm-4 col-form-label">Nama Pelanggan</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="namaPelanggan" placeholder="Nama Pelanggan" name="nama_pelanggan" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="alamatPelanggan" class="col-sm-4 col-form-label">Alamat Pelanggan</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="alamatPelanggan" placeholder="Alamat Pelanggan" name="alamat_pelanggan" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="jenisKelamin" class="col-sm-4 col-form-label">Jenis Kelamin</label>
                                    <div class="col-sm-8">
                                        <select class="form-control" id="jenisKelamin" name="jenis_kelamin" required>
                                            <option value="">- Pilih Role -</option>
                                            <option value="Laki-laki">Laki-laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="noTlp" class="col-sm-4 col-form-label">No Telepon</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="noTlp" placeholder="No Telepon" name="no_tlp" required>
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
        <form class="form-horizontal" action="<?php echo base_url('kasir/pelanggan/update') ?>" method="post">
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
                                    <label for="namaPelanggan" class="col-sm-4 col-form-label">Nama Pelanggan</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control nama_pelanggan" id="namaPelanggan" placeholder="Nama Pelanggan" name="nama_pelanggan" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="alamatPelanggan" class="col-sm-4 col-form-label">Alamat Pelanggan</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control alamat_pelanggan" id="alamatPelanggan" placeholder="Alamat Pelanggan" name="alamat_pelanggan" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="jenisKelamin" class="col-sm-4 col-form-label">Jenis Kelamin</label>
                                    <div class="col-sm-8">
                                        <select class="form-control jenis_kelamin" id="jenisKelamin" name="jenis_kelamin" required>
                                            <option value="">- Pilih Jenis Kelamin -</option>
                                            <option value="Laki-laki">Laki-laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="noTlp" class="col-sm-4 col-form-label">No Telepon</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control no_tlp" id="noTlp" placeholder="No Telepon" name="no_tlp" required>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <div class="modal-footer justify-content-between">
                            <input type="hidden" name="id_member" class="id_member">
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
        <form class="form-horizontal" action="<?php echo base_url('kasir/pelanggan/delete') ?>" method="post">
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
                            <input type="hidden" name="id_member" class="id_member">
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