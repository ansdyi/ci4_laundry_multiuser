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
                            <th>Nama Pengguna</th>
                            <th>Username</th>
                            <th>Nama Outlet</th>
                            <th>Role</th>
                            <th class="bg-secondary">Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($pengguna as $item) : ?>
                            <tr>
                                <td><?= $i ?></td>
                                <td><?= $item->nama_pengguna; ?></td>
                                <td><?= $item->username; ?></td>
                                <td><?= $item->nama_outlet; ?></td>
                                <td><?= $item->role; ?></td>
                                <td class="text-center">
                                    <button class="btn-warning btn-edit-pengguna" data-id="<?= $item->id_user; ?>" data-nama="<?= $item->nama_pengguna; ?>" data-username="<?= $item->username; ?>" data-outlet="<?= $item->id_outlet; ?>" data-role="<?= $item->role; ?>">
                                        <i class="nav-icon fas fa-pen" aria-hidden="true"></i>
                                    </button>

                                    <button class="btn-danger btn-delete-pengguna" data-id="<?= $item->id_user; ?>">
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
                <?= $penggunacount; ?> Total Data
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

        <!-- Modal Create Data -->
        <form class="form-horizontal" action="<?php echo base_url('admin/pengguna/save') ?>" method="post">
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
                                    <label for="namaPengguna" class="col-sm-4 col-form-label">Nama Pengguna</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="namaPengguna" placeholder="Nama Pengguna" name="nama_pengguna" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="userName" class="col-sm-4 col-form-label">Username</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="userName" placeholder="Username" name="username" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="passWord" class="col-sm-4 col-form-label">Password</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="passWord" placeholder="Password" name="password" required>
                                    </div>
                                </div>
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
                                    <label for="namaRole" class="col-sm-4 col-form-label">Role</label>
                                    <div class="col-sm-8">
                                        <select class="form-control" id="namaRole" name="role" required>
                                            <option value="">- Pilih Role -</option>
                                            <option value="Admin">Admin</option>
                                            <option value="Kasir">Kasir</option>
                                            <option value="Owner">Owner</option>
                                        </select>
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
        <form class="form-horizontal" action="<?php echo base_url('admin/pengguna/update') ?>" method="post">
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
                                    <label for="namaPengguna" class="col-sm-4 col-form-label">Nama Pengguna</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control nama_pengguna" id="namaPengguna" placeholder="Nama Pengguna" name="nama_pengguna" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="userName" class="col-sm-4 col-form-label">Username</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control username" id="userName" placeholder="Username" name="username" readonly="readonly">
                                    </div>
                                </div>
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
                                    <label for="namaRole" class="col-sm-4 col-form-label">Role</label>
                                    <div class="col-sm-8">
                                        <select class="form-control role" id="namaRole" name="role" required>
                                            <option value="">- Pilih Role -</option>
                                            <option value="Admin">Admin</option>
                                            <option value="Kasir">Kasir</option>
                                            <option value="Owner">Owner</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <div class="modal-footer justify-content-between">
                            <input type="hidden" name="id_user" class="id_user">
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
        <form class="form-horizontal" action="<?php echo base_url('admin/pengguna/delete') ?>" method="post">
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
                            <input type="hidden" name="id_user" class="id_user">
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