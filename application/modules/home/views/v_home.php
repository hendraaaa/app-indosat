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

</head>

<body>
    <div id="load" class="overlay"></div>

    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.html">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Components</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Components:</h6>
                        <a class="collapse-item" href="buttons.html">Buttons</a>
                        <a class="collapse-item" href="cards.html">Cards</a>
                    </div>
                </div>
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
                            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                        </div>
                        <div class="card-body">


                            <div class="print">
                                <button id="tambah" class="btn btn-primary btn-circle btn-sm mb-2 mr-1">
                                    <i class="fa fa-plus"></i>
                                </button>
                                <button id="deleteAll" class="btn btn-danger btn-circle btn-sm mb-2">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </div>
                            <div class="table-responsive">
                                <form action="#" id="form">
                                    <table id="table_id" class="display table table-striped table-bordered table-hover no-footer dataTable" width="100%" cellspacing="0">

                                        <thead>
                                            <tr>
                                                <th>id</th>
                                                <th>No</th>
                                                <th>site</th>
                                                <th style="width: 100px;">jenis barang</th>
                                                <th>brand</th>
                                                <th>deskripsi</th>
                                                <th>SN</th>
                                                <th>kondisi</th>
                                                <th>tanggal</th>
                                                <th>last modify</th>
                                                <th style="text-align: center;width: 100px;">#</th>
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
                "url": "<?= site_url('home/ambilData') ?>",
                "type": "POST"
            },
            "responsive": true,
            "orderable": false,
            responsive: true,
            "destroy": true,
            cache: false,

            "processing": true,
            "columnDefs": [{
                "targets": [0],
                "visible": false,
                "searchable": false
            }, ],

            "order": [],
            select: {
                style: 'multi',
                selector: 'td:not(:nth-child(10))'
            },
            dom: 'Bfrtip',
            buttons: [{
                    extend: 'print',
                    text: '<i class="fa fa-lg fa-print"></i>',
                    className: 'btn btn-info btn-circle btn-sm mb-2 mr-2',
                    exportOptions: {
                        columns: ':visible',
                        columns: [1, 2, 3, 4, 5, 6, 7, 8, 9],
                    },
                },
                {
                    extend: "excel",
                    text: '<i class="fa fa-lg fa-file-excel"></i>',
                    className: 'btn btn-secondary btn-circle btn-sm mb-2 mr-2',
                    exportOptions: {
                        columns: ':visible',
                        columns: [1, 2, 3, 4, 5, 6, 7, 8, 9],
                        filename: function() {
                            var d = new Date();
                            var n = d.getTime();
                            return 'myfile' + n;
                        },
                    },
                },
                {
                    extend: "copy",
                    text: '<i class="fa fa-lg fa-copy"></i>',
                    className: 'btn btn-dark btn-circle btn-sm mb-2 mr-2',
                    exportOptions: {
                        columns: ':visible',
                        columns: [1, 2, 3, 4, 5, 6, 7, 8, 9],
                        filename: function() {
                            var d = new Date();
                            var n = d.getTime();
                            return 'myfile' + n;
                        },
                    },
                },
            ]

        })
        $("button").removeClass("dt-button");
        table.buttons().container().appendTo($('.print'));

        $('#deleteAll').click(function(e) {

            var testValue = table.rows({
                selected: true
            }).count();

            // var test = table.rows({
            //     selected: true
            // }).data();
            var ids = table.rows({
                selected: true
            }).data().pluck(0).toArray();

            if (testValue == 0) {
                Swal.fire(
                    'Error',
                    'Anda harus memilih data minimal 1',
                    'error'
                )
            } else {
                Swal.fire({
                    title: 'Hapus Data',
                    text: `apakah kamu yakin menghapus data ${testValue} baris ?`,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Hapus',
                    cancelButtonText: 'Batalkan'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: "POST",
                            url: '<?= site_url('home/hapusAll') ?>',
                            data: {
                                test: ids
                            },
                            dataType: 'json',
                            success: function(response) {

                                if (response.sukses) {
                                    console.log(response.sukses)
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Berhasil',
                                        text: 'Data berhasil dihapus',
                                        confirmButtonColor: '#3085d6',
                                    })
                                    reload_table()
                                }

                            }
                        })

                    }
                })
            }

        })

    })
    $(document).ready(function() {
        $('#load').fadeOut('slow');
        reload_table()
        $('#tambah').click(function(e) {
            $.ajax({
                url: "<?= site_url('home/formTambah') ?>",
                dataType: "json",
                success: function(result) {
                    console.log(result);

                    if (result.success) {
                        console.log(result);

                        $('.viewmodal').html(result.success).show()
                        $('#exampleModal').on('shown.bs.modal', function(e) {
                            $('#site').focus()
                        })
                        $('#exampleModal').modal('show')

                    }

                }

            })
        })
    });

    function reload_table() {
        table.ajax.reload(null, false); //reload datatable ajax 
    }

    function edit(id) {
        $.ajax({
            type: "POST",
            url: "<?= site_url('home/formedit') ?>",
            dataType: "json",
            data: {
                id: id
            },
            success: function(result) {
                console.log(result);
                if (result.success) {
                    $('.viewmodal').html(result.success).show()
                    $('#exampleModalEdit').on('shown.bs.modal', function(e) {
                        $('#site').focus()
                    })
                    $('#exampleModalEdit').modal('show')

                }

            }

        })

    }

    function hapus(id) {

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: '<?= site_url('home/hapus') ?>',
                    data: {
                        id: id
                    },
                    dataType: 'json',
                    success: function(response) {
                        if (response.sukses) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil',
                                text: 'Data berhasil dihapus',
                                confirmButtonColor: '#3085d6',


                            })
                            reload_table()
                        }
                    }
                })

            }
        })




    }
</script>

</html>