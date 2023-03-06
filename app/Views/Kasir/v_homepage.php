<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title; ?></title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url('assets/adminlte') ?>/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url('assets/adminlte') ?>/dist/css/adminlte.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="<?php echo base_url('assets/adminlte') ?>/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="<?php echo base_url('assets/adminlte') ?>/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">

                <!-- Logout Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="fas fa-chevron-right"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <div class="dropdown-divider"></div>
                        <a href="<?= base_url('auth/logout') ?>" class="dropdown-item dropdown-footer">Logout</a>
                    </div>
                </li>
                <!-- Fullscreen -->
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="https://www.instagram.com/ansdyi/" class="brand-link">
                <img src="<?php echo base_url('assets/adminlte') ?>/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">My Laundry <?= session()->get('id_outlet') ?></span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="<?php echo base_url('assets/adminlte') ?>/dist/img/avatar3.png" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="https://www.instagram.com/ansdyi/" class="d-block"><?= session()->get('nama_pengguna') ?></a>
                    </div>
                </div>
                <div class="user-panel mt-3 mb-4 d-flex">
                    <div class="info">
                        <p class="text-white">Your Role as: <?= session()->get('role') ?></p>
                    </div>
                </div>

                <!-- SidebarSearch Form -->
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
                            with font-awesome or any other icon font library -->
                        <li class="nav-header">Dashboard</li>
                        <li class="nav-item">
                            <a href="<?= base_url('kasir/dashboard') ?>" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-header">Transaksi</li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-table"></i>
                                <p>
                                    Transaksi
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= base_url('kasir/pelanggan') ?>" class="nav-link">
                                        <i class="nav-icon far fa-circle"></i>
                                        <p>Registrasi Pelanggan</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('kasir/transaksi') ?>" class="nav-link">
                                        <i class="nav-icon far fa-circle"></i>
                                        <p>Entri Transaksi</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-header">Laporan</li>
                        <li class="nav-item">
                            <a href="<?= base_url('kasir/laporan') ?>" class="nav-link">
                                <i class="nav-icon fas fa-copy"></i>
                                <p>
                                    Laporan
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <?php
        if (isset($page)) {
            echo $page;
        }
        ?>
        <!-- /.content-wrapper -->

        <!-- Footer -->
        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 3.2.0
            </div>
            <strong>Copyright &copy; 2023 Anisa Damayanti for 12th Grade of Software Engineering [Ujikom P3 Website]. </strong> All rights reserved.

        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="<?php echo base_url('assets/adminlte') ?>/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo base_url('assets/adminlte') ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url('assets/adminlte') ?>/dist/js/adminlte.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="<?php echo base_url('assets/adminlte') ?>/plugins/sweetalert2/sweetalert2.min.js"></script>
    <script>
        $(function() {
            var Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });

            $('document').ready(function() {
                <?php if (session()->getFlashdata('title')) { ?>
                    Toast.fire({
                        icon: 'success',
                        title: '<?= session()->getFlashdata('title') ?>',
                        text: '<?= session()->getFlashdata('text') ?>',
                    });
                <?php } ?>
            });
        });
    </script>
    <!-- bs-custom-file-input -->
    <script src="<?php echo base_url('assets/adminlte') ?>/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
    <script>
        $(function() {
            bsCustomFileInput.init();
        });
    </script>
    <!-- InputMask -->
    <script src="<?php echo base_url('assets/adminlte') ?>/plugins/moment/moment.min.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="<?php echo base_url('assets/adminlte') ?>/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <script>
        $(function() {
            $('#tglTransaksi').datetimepicker({
                icons: {
                    time: 'far fa-clock'
                }
            });
            $('#batasWaktu').datetimepicker({
                icons: {
                    time: 'far fa-clock'
                }
            });
            $('#tglBayar').datetimepicker({
                icons: {
                    time: 'far fa-clock'
                }
            });
        })
    </script>
    <!-- Modal Edit & Delete -->
    <script>
        $(document).ready(function() {

            // get Edit Pengguna
            $('.btn-edit-pengguna').on('click', function() {
                // get data from button edit
                const id = $(this).data('id');
                const nama = $(this).data('nama');
                const username = $(this).data('username');
                const outlet = $(this).data('outlet');
                const role = $(this).data('role');

                // Set data to Form Edit
                $('.id_user').val(id);
                $('.nama_pengguna').val(nama);
                $('.username').val(username);
                $('.id_outlet').val(outlet);
                $('.role').val(role).trigger('change');

                // Call Modal Edit
                $('#updateData').modal('show');
            });

            // get Delete Pengguna
            $('.btn-delete-pengguna').on('click', function() {
                // get data from button edit
                const id = $(this).data('id');

                // Set data to Form Edit
                $('.id_user').val(id);

                // Call Modal Edit
                $('#deleteData').modal('show');
            });

            // get Edit Paket
            $('.btn-edit-paket').on('click', function() {
                // get data from button edit
                const id = $(this).data('id');
                const outlet = $(this).data('outlet');
                const jenis = $(this).data('jenis');
                const nama = $(this).data('nama');
                const harga = $(this).data('harga');

                // Set data to Form Edit
                $('.id_paket').val(id);
                $('.id_outlet').val(outlet);
                $('.jenis_paket').val(jenis);
                $('.nama_paket').val(nama);
                $('.harga').val(harga).trigger('change');

                // Call Modal Edit
                $('#updateData').modal('show');
            });

            // get Delete Paket
            $('.btn-delete-paket').on('click', function() {
                // get data from button edit
                const id = $(this).data('id');

                // Set data to Form Edit
                $('.id_paket').val(id);

                // Call Modal Edit
                $('#deleteData').modal('show');
            });

            // get Edit Outlet
            $('.btn-edit-outlet').on('click', function() {
                // get data from button edit
                const id = $(this).data('id');
                const nama = $(this).data('nama');
                const alamat = $(this).data('alamat');
                const tlp = $(this).data('tlp');

                // Set data to Form Edit
                $('.id_outlet').val(id);
                $('.nama_outlet').val(nama);
                $('.alamat_outlet').val(alamat);
                $('.no_tlp').val(tlp).trigger('change');

                // Call Modal Edit
                $('#updateData').modal('show');
            });

            // get Delete Outlet
            $('.btn-delete-outlet').on('click', function() {
                // get data from button edit
                const id = $(this).data('id');

                // Set data to Form Edit
                $('.id_outlet').val(id);

                // Call Modal Edit
                $('#deleteData').modal('show');
            });

            // get Edit Pelanggan
            $('.btn-edit-pelanggan').on('click', function() {
                // get data from button edit
                const id = $(this).data('id');
                const nama = $(this).data('nama');
                const alamat = $(this).data('alamat');
                const jenis = $(this).data('jenis');
                const tlp = $(this).data('tlp');

                // Set data to Form Edit
                $('.id_member').val(id);
                $('.nama_pelanggan').val(nama);
                $('.alamat_pelanggan').val(alamat);
                $('.jenis_kelamin').val(jenis);
                $('.no_tlp').val(tlp).trigger('change');

                // Call Modal Edit
                $('#updateData').modal('show');
            });

            // get Delete Pelanggan
            $('.btn-delete-pelanggan').on('click', function() {
                // get data from button edit
                const id = $(this).data('id');

                // Set data to Form Edit
                $('.id_member').val(id);

                // Call Modal Edit
                $('#deleteData').modal('show');
            });

            // get Edit Transaksi
            $('.btn-update-transaksi').on('click', function() {
                // get data from button edit
                const id = $(this).data('id');
                const inv = $(this).data('inv');
                const id_member = $(this).data('id_member');
                const tglbayar = $(this).data('tglbayar');
                const stattransaksi = $(this).data('stattransaksi');
                const statbayar = $(this).data('statbayar');

                // Set data to Form Edit
                $('.id_transaksi').val(id);
                $('.kode_invoice').val(inv);
                $('.id_member').val(id_member);
                $('.tgl_bayar').val(tglbayar);
                $('.status_transaksi').val(stattransaksi);
                $('.status_bayar').val(statbayar).trigger('change');

                // Call Modal Edit
                $('#updateData').modal('show');
            });

            // get Delete Transaksi
            $('.btn-delete-transaksi').on('click', function() {
                // get data from button edit
                const id = $(this).data('id');

                // Set data to Form Edit
                $('.id_transaksi').val(id);

                // Call Modal Edit
                $('#deleteData').modal('show');
            });
        });
    </script>
    <!-- Auto Code -->
    <script>
        $(document).ready(function() {
            $.ajax({
                url: "<?= base_url('kasir/transaksi/autocode') ?>",
                type: "GET",
                success: function(print) {
                    var code = $.parseJSON(print);
                    $('#kdInvoice').val(code);
                }
            })
        })
    </script>
</body>

</html>