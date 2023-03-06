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
                            <th>Alamat Outlet</th>
                            <th>No Telepon</th>
                            <th class="bg-secondary">Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($outlet as $item) : ?>
                            <tr>
                                <td><?= $i ?></td>
                                <td><?= $item->nama_outlet; ?></td>
                                <td><?= $item->alamat_outlet; ?></td>
                                <td><?= $item->no_tlp; ?></td>
                                <td class="text-center">
                                    <button class="btn-warning btn-edit-outlet" data-id="<?= $item->id_outlet; ?>" data-nama="<?= $item->nama_outlet; ?>" data-alamat="<?= $item->alamat_outlet; ?>" data-tlp="<?= $item->no_tlp; ?>">
                                        <i class="nav-icon fas fa-pen" aria-hidden="true"></i>
                                    </button>

                                    <button class="btn-danger btn-delete-outlet" data-id="<?= $item->id_outlet; ?>">
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
                <?= $outletcount; ?> Total Data
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

        <!-- Modal Create Data -->
        <form class="form-horizontal" action="<?php echo base_url('admin/outlet/save') ?>" method="post">
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
                                        <input type="text" class="form-control" id="namaOutlet" placeholder="Nama Outlet" name="nama_outlet" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="alamatOutlet" class="col-sm-4 col-form-label">Alamat Outlet</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="alamatOutlet" placeholder="Alamat Outlet" name="alamat_outlet" required>
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
        <form class="form-horizontal" action="<?php echo base_url('admin/outlet/update') ?>" method="post">
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
                                        <input type="text" class="form-control nama_outlet" id="namaOutlet" placeholder="Nama Outlet" name="nama_outlet" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="alamatOutlet" class="col-sm-4 col-form-label">Alamat Outlet</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control alamat_outlet" id="alamatOutlet" placeholder="Alamat Outlet" name="alamat_outlet" required>
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
                            <input type="hidden" name="id_outlet" class="id_outlet">
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
        <form class="form-horizontal" action="<?php echo base_url('admin/outlet/delete') ?>" method="post">
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
                            <input type="hidden" name="id_outlet" class="id_outlet">
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