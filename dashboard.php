<?php
session_start();
if (!isset($_SESSION['status']) || $_SESSION['status'] != true) {
    header('location:login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Tables</title>

    <!-- Custom fonts for this template -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/startbootstrap-sb-admin-2/4.1.4/css/sb-admin-2.min.css">

    <!-- Custom styles for this page -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/css/dataTables.bootstrap4.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script>
    $(document).ready(function(){ //ready function

        //menu mahasiswa
        $("#m_mahasiswa").click(function(){
        loadMhs();        
        });

        //menu dosen
        $("#m_dosen").click(function(){
        loadDosen();        
        });

        //menu jadwal
        $("#jadwal").click(function(){
        loadJadwal();        
        });

        //menu krs
        $("#krs").click(function(){
        loadKrs();        
        });

        //kartu dashboard diklik -> buka menu terkait
        $("#card_mhs").click(function(){
        loadMhs();
        });

        $("#card_dosen").click(function(){
        loadDosen();
        });

        $("#card_jadwal").click(function(){
        loadJadwal();
        });

        $("#card_krs").click(function(){
        loadKrs();
        });

        //menu profile
        $("#content").on("click", "#profile_menu", function(){
            loadProfile();
        });

        //update profile
        $("#contentData").on("submit", "#formProfile", function(e) {
            e.preventDefault();
            $.ajax({
                url: 'profile.php?action=update',
                type: 'post',
                data: $(this).serialize(),
                success: function(data) {
                    alert(data);
                    loadProfile();
                }
            });
        });
        
        $("#contentData").on("click", "#addButton", function() {
                $.ajax({
                    url: 'form-add.php',
                    type: 'get',
                    success: function(data) {
                        $('#contentData').html(data);
                    }
                });
            });

        //simpan data mahasiswa
        $("#contentData").on("submit", "#formMhs", function(e) {
                e.preventDefault();
                $.ajax({
                    url: 'mahasiswa/mahasiswa.php?action=save',
                    type: 'post',
                    data: $(this).serialize(),
                    success: function(data) {
                        alert(data);
                        loadMhs(); 
                    }
                });
            });

         //hapus data mahasiswa berdasarkan nim
         $("#contentData").on("click", "#deleteMhs", function() {
                var nim = $(this).attr("value");
                $.ajax({
                    url: 'mahasiswa/mahasiswa.php?action=delete',
                    type: 'post',
                    data: {
                        nim: nim
                    },
                    success: function(data) {
                        alert(data);
                        loadMhs();
                    }
                });
            });

            //Load form edit dengan parameter IdMhsw
            $("#contentData").on("click", "#editMhs", function() {
                var nim = $(this).attr("value");
                $.ajax({
                    url: 'mahasiswa/edit.php',
                    type: 'get',
                    data: {
                        nim: nim
                    },
                    success: function(data) {
                        $('#contentData').html(data);
                    }
                });
            });

            //edit data mahasiswa
            $("#contentData").on("submit", "#formEditMhs", function(e) {
                e.preventDefault();
                $.ajax({
                    url: 'mahasiswa/mahasiswa.php?action=edit',
                    type: 'post',
                    data: $(this).serialize(),
                    success: function(data) {  
                        alert(data);
                        loadMhs();
                    }
                });
            });

            //simpan data dosen
            $("#contentData").on("submit", "#formDosen", function(e) {
                e.preventDefault();
                $.ajax({
                    url: 'dosen/dosen.php?action=save',
                    type: 'post',
                    data: $(this).serialize(),
                    success: function(data) {
                        alert(data);
                        loadDosen();
                    }
                });
            });

         //hapus data dosen berdasarkan kode dosen
         $("#contentData").on("click", "#deleteDosen", function() {
                var kd_dosen = $(this).attr("value");
                $.ajax({
                    url: 'dosen/dosen.php?action=delete',
                    type: 'post',
                    data: {
                        kd_dosen: kd_dosen
                    },
                    success: function(data) {
                        alert(data);
                        loadDosen();
                    }
                });
            });

            //Load form edit dengan parameter kode dosen
            $("#contentData").on("click", "#editDosen", function() {
                var kd_dosen = $(this).attr("value");
                $.ajax({
                    url: 'dosen/edit.php',
                    type: 'get',
                    data: {
                        kd_dosen: kd_dosen
                    },
                    success: function(data) {
                        $('#contentData').html(data);
                    }
                });
            });

            //edit data dosen
            $("#contentData").on("submit", "#formEditDosen", function(e) {
                e.preventDefault();
                $.ajax({
                    url: 'dosen/dosen.php?action=edit',
                    type: 'post',
                    data: $(this).serialize(),
                    success: function(data) {
                        alert(data);
                        loadDosen();
                    }
                });
            });

            //simpan data jadwal
            $("#contentData").on("submit", "#formJadwal", function(e) {
                e.preventDefault();
                $.ajax({
                    url: 'jadwal/jadwal.php?action=save',
                    type: 'post',
                    data: $(this).serialize(),
                    success: function(data) {
                        alert(data);
                        loadJadwal();
                    }
                });
            });

         //hapus data jadwal berdasarkan id
         $("#contentData").on("click", "#deleteJadwal", function() {
                var id = $(this).attr("value");
                $.ajax({
                    url: 'jadwal/jadwal.php?action=delete',
                    type: 'post',
                    data: {
                        id: id
                    },
                    success: function(data) {
                        alert(data);
                        loadJadwal();
                    }
                });
            });

            //Load form edit dengan parameter id jadwal
            $("#contentData").on("click", "#editJadwal", function() {
                var id = $(this).attr("value");
                $.ajax({
                    url: 'jadwal/edit.php',
                    type: 'get',
                    data: {
                        id: id
                    },
                    success: function(data) {
                        $('#contentData').html(data);
                    }
                });
            });

            //edit data jadwal
            $("#contentData").on("submit", "#formEditJadwal", function(e) {
                e.preventDefault();
                $.ajax({
                    url: 'jadwal/jadwal.php?action=edit',
                    type: 'post',
                    data: $(this).serialize(),
                    success: function(data) {
                        alert(data);
                        loadJadwal();
                    }
                });
            });

            //simpan data krs
            $("#contentData").on("submit", "#formKrs", function(e) {
                e.preventDefault();
                $.ajax({
                    url: 'krs/krs.php?action=save',
                    type: 'post',
                    data: $(this).serialize(),
                    success: function(data) {
                        alert(data);
                        loadKrs();
                    }
                });
            });

         //hapus data krs berdasarkan id
         $("#contentData").on("click", "#deleteKrs", function() {
                var id = $(this).attr("value");
                $.ajax({
                    url: 'krs/krs.php?action=delete',
                    type: 'post',
                    data: {
                        id: id
                    },
                    success: function(data) {
                        alert(data);
                        loadKrs();
                    }
                });
            });

            //Load form edit dengan parameter id krs
            $("#contentData").on("click", "#editKrs", function() {
                var id = $(this).attr("value");
                $.ajax({
                    url: 'krs/edit.php',
                    type: 'get',
                    data: {
                        id: id
                    },
                    success: function(data) {
                        $('#contentData').html(data);
                    }
                });
            });

            //edit data krs
            $("#contentData").on("submit", "#formEditKrs", function(e) {
                e.preventDefault();
                $.ajax({
                    url: 'krs/krs.php?action=edit',
                    type: 'post',
                    data: $(this).serialize(),
                    success: function(data) {
                        alert(data);
                        loadKrs();
                    }
                });
            });

        

    });//end ready function

    function loadMhs() {
            $.ajax({
                url: 'mahasiswa/list.php',
                type: 'get',
                success: function(data) {
                    $('#contentData').html(data);
                }
            });
        }

        function loadDosen() {
            $.ajax({
                url: 'dosen/list.php',
                type: 'get',
                success: function(data) {
                    $('#contentData').html(data);
                }
            });
        }

        function loadJadwal() {
            $.ajax({
                url: 'jadwal/list.php',
                type: 'get',
                success: function(data) {
                    $('#contentData').html(data);
                }
            });
        }

        function loadKrs() {
            $.ajax({
                url: 'krs/list.php',
                type: 'get',
                success: function(data) {
                    $('#contentData').html(data);
                }
            });
        }

        function loadProfile() {
            $.ajax({
                url: 'profile.php?action=view',
                type: 'get',
                success: function(data) {
                    $('#contentData').html(data);
                }
            });
        }

      
</script>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="dashboard.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="dashboard.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Menu Utama
            </div>

            <!-- Nav Item - Mahasiswa -->
            <li class="nav-item">
                <a class="nav-link" href="#" id="m_mahasiswa">
                    <i class="fas fa-fw fa-user-graduate"></i>
                    <span>Mahasiswa</span></a>
            </li>

            <!-- Nav Item - Dosen -->
            <li class="nav-item">
                <a class="nav-link" href="#" id="m_dosen">
                    <i class="fas fa-fw fa-chalkboard-teacher"></i>
                    <span>Dosen</span></a>
            </li>

            <!-- Nav Item - Jadwal -->
            <li class="nav-item">
                <a class="nav-link" href="#" id="jadwal">
                    <i class="fas fa-fw fa-calendar-alt"></i>
                    <span>Jadwal</span></a>
            </li>

            <!-- Nav Item - KRS -->
            <li class="nav-item">
                <a class="nav-link" href="#" id="krs">
                    <i class="fas fa-fw fa-file-signature"></i>
                    <span>KRS</span></a>
            </li>
           
            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['username']; ?></span>
                                <img class="img-profile rounded-circle"
                                    src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" id="profile_menu">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div id="contentData">
                <div class="container-fluid">

        <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between">
                <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            </div>

            <!-- Ringkasan data per menu -->
            <?php
            include "db.php";
            $db=new db;
            $ringkasan=$db->get_dashboard();
            ?>

            <div class="row mt-4">

                <div class="col-xl-3 col-sm-6 mb-4">
                    <div class="card border-0 shadow h-100" id="card_mhs">
                        <div class="card-body d-flex align-items-center">
                            <div class="icon-circle bg-primary mr-3">
                                <i class="fas fa-user-graduate text-white"></i>
                            </div>
                            <div>
                                <div class="text-xs font-weight-bold text-uppercase text-gray-500 mb-1">Mahasiswa</div>
                                <div class="h4 mb-0 font-weight-bold text-gray-800"><?php echo $ringkasan['total_mhs']; ?></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-sm-6 mb-4">
                    <div class="card border-0 shadow h-100" id="card_dosen">
                        <div class="card-body d-flex align-items-center">
                            <div class="icon-circle bg-success mr-3">
                                <i class="fas fa-chalkboard-teacher text-white"></i>
                            </div>
                            <div>
                                <div class="text-xs font-weight-bold text-uppercase text-gray-500 mb-1">Dosen</div>
                                <div class="h4 mb-0 font-weight-bold text-gray-800"><?php echo $ringkasan['total_dosen']; ?></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-sm-6 mb-4">
                    <div class="card border-0 shadow h-100" id="card_jadwal">
                        <div class="card-body d-flex align-items-center">
                            <div class="icon-circle bg-warning mr-3">
                                <i class="fas fa-calendar-alt text-white"></i>
                            </div>
                            <div>
                                <div class="text-xs font-weight-bold text-uppercase text-gray-500 mb-1">Jadwal</div>
                                <div class="h4 mb-0 font-weight-bold text-gray-800"><?php echo $ringkasan['total_jadwal']; ?></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-sm-6 mb-4">
                    <div class="card border-0 shadow h-100" id="card_krs">
                        <div class="card-body d-flex align-items-center">
                            <div class="icon-circle bg-info mr-3">
                                <i class="fas fa-file-signature text-white"></i>
                            </div>
                            <div>
                                <div class="text-xs font-weight-bold text-uppercase text-gray-500 mb-1">KRS</div>
                                <div class="h4 mb-0 font-weight-bold text-gray-800"><?php echo $ringkasan['total_krs']; ?></div>
                            </div>
                        </div>
                    </div>
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
                        <span>Copyright &copy; Your Website 2023</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
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
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.2/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/startbootstrap-sb-admin-2/4.1.4/js/sb-admin-2.min.js"></script>

    

   

</body>

</html>