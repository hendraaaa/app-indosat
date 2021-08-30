<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="shortcut icon" type="image/ico" href="<?php echo base_url() ?>assets/images/iconindosat.png">
    <style>
        #load {
            width: 100%;
            height: 100%;
            position: fixed;
            text-indent: 100%;
            background: #e0e0e0 url("<?php echo base_url() ?>assets/images/loading.gif")no-repeat center;
            z-index: 1;
            opacity: 0.6;
            background-size: 8%;

        }

        .swal-height {
            height: 80vh;
        }
    </style>
    <title>History</title>


</head>

<body>
    <div id="load" class="overlay"></div>

    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo base_url('home') ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Heading -->
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo base_url('history') ?>">
                    <i class="fas fa-fw fa-history"></i>
                    <span>History</span></a>
            </li>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <div class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <h5 class="text-gray-900 p-3 m-0">Sistem Informasi</h5>
                    </div>

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $this->session->userdata('sess_app')['nama']; ?></span>
                                <img class="img-profile rounded-circle" src="assets/vendor/sbadmin2/img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">

                                <a class="dropdown-item" href="index.html" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">History</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <form action="#" id="form">
                                    <table id="table_id" class="display table table-striped table-bordered table-hover no-footer dataTable" width="100%" cellspacing="0">

                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Username</th>
                                                <th>Action</th>
                                                <th>SN</th>
                                                <th>Time</th>
                                            </tr>
                                        </thead>

                                    </table>

                                </form>


                            </div>

                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Indosat oreedo 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->
        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="<?php echo base_url("home/logout") ?>">Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="viewmodal" style="display: none;"></div>
</body>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> -->
<script>
    var table;
    $(document).ready(function() {
        table = $('#table_id').DataTable({
            "serverSide": true,
            "order": [],

            "ajax": {
                "url": "<?= site_url('history/ambilData') ?>",
                "type": "POST"
            },
            "responsive": true,
            "orderable": false,
            responsive: true,
            "destroy": true,
            cache: false,

            "processing": true,


            "order": [],

        })


    })
    $(document).ready(function() {
        $('#load').fadeOut('slow');
        reload_table()
    });

    function reload_table() {
        table.ajax.reload(null, false); //reload datatable ajax 
    }
</script>

</html>