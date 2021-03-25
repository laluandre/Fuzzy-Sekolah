<?php

$conn = mysqli_connect("localhost", "root", "", "ai-sekolah");
$id = $_GET["id"];

$data = mysqli_query($conn, "SELECT * FROM user WHERE id_user='$id'");
$row = mysqli_fetch_assoc($data);
$nilai = mysqli_query($conn, "SELECT * FROM nilai WHERE id_user='$id'");
$nilai = mysqli_fetch_assoc($nilai);
$fuzzyn = mysqli_query($conn, "SELECT * FROM fuzzy_nilai WHERE id_user='$id'");
$fuzzyn = mysqli_fetch_assoc($fuzzyn);
$fuzzyg = mysqli_query($conn, "SELECT * FROM fuzzy_gaji WHERE id_user='$id'");
$fuzzyg = mysqli_fetch_assoc($fuzzyg);
$fuzzyj = mysqli_query($conn, "SELECT * FROM fuzzy_jarak WHERE id_user='$id'");
$fuzzyj = mysqli_fetch_assoc($fuzzyj);
$inf = mysqli_query($conn, "SELECT * FROM inferensi WHERE id_user='$id'");
$inf = mysqli_fetch_assoc($inf);
$defuzz = mysqli_query($conn, "SELECT * FROM defuzzifikasi WHERE id_user='$id'");
$defuzz = mysqli_fetch_assoc($defuzz);

?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Profile</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="admin.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Sekolah Menengah</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="admin.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Calon Siswa
            </div>

            <!-- Nav Item - Tables -->
            <li class="nav-item active">
                <a class="nav-link" href="calon.php">
                    <i class="fas fa-user-edit"></i>
                    <span>Siswa Pendaftar</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

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

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin</span>
                                <img class="img-profile rounded-circle" src="img/user.png">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
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
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="col-md-5">
                        <form>
                            <div class="form-group">
                                <label for="nama">Nama Lengkap</label>
                                <input type="text" class="form-control" placeholder="<?= $row["nama"]; ?>" disabled>
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="text" class="form-control" placeholder="<?= $row["email"]; ?>" disabled>
                            </div>
                            <div class="form-group">
                                <label for="">Jenis Kelamin</label>
                                <input type="text" class="form-control" placeholder="<?= $row["gender"]; ?>" disabled>
                            </div>
                            <div class="form-group">
                                <label for="">Jurusan Yang Diminati</label>
                                <input type="text" class="form-control" placeholder="<?= $row["jurusan"]; ?>" disabled>
                            </div>
                            <div class="form-group">
                                <label for="">Jalur Masuk</label>
                                <input type="text" class="form-control" placeholder="<?= $row["jalur"]; ?>" disabled>
                            </div>
                            <div class="form-group">
                                <label for="">Jarak Rumah Sekolah</label>
                                <input type="text" class="form-control" placeholder="<?= $row["jarak"]; ?> Km" disabled>
                            </div>
                            <div class="form-group">
                                <label for="">Gaji Orangtua per Bulan</label>
                                <input type="text" class="form-control" placeholder="<?= $row["gaji"]; ?> Juta" disabled>
                            </div>
                            <div class="form-group">
                                <div class="form-row">
                                    <div class="col">
                                        <label for="">Matematika</label>
                                        <input type="text" class="form-control" placeholder="<?= $nilai["matematika"]; ?>" disabled>
                                    </div>
                                    <div class="col">
                                        <label for="">Bhs. Indonesia</label>
                                        <input type="text" class="form-control" placeholder="<?= $nilai["bhs_indo"]; ?>" disabled>
                                    </div>
                                    <div class="col">
                                        <label for="">Bhs. Inggris</label>
                                        <input type="text" class="form-control" placeholder="<?= $nilai["bhs_inggris"]; ?>" disabled>
                                    </div>
                                </div>
                            </div>
                            <label for="">Fuzzy Nilai</label>
                            <div class="form-group">
                                <div class="form-row">
                                    <div class="col">
                                        <label for="">Buruk</label>
                                        <input type="text" class="form-control" placeholder="<?= $fuzzyn["buruk"]; ?>" disabled>
                                    </div>
                                    <div class="col">
                                        <label for="">Sedang</label>
                                        <input type="text" class="form-control" placeholder="<?= $fuzzyn["sedang"]; ?>" disabled>
                                    </div>
                                    <div class="col">
                                        <label for="">Bagus</label>
                                        <input type="text" class="form-control" placeholder="<?= $fuzzyn["bagus"]; ?>" disabled>
                                    </div>
                                </div>
                            </div>
                            <label for="">Fuzzy Jarak</label>
                            <div class="form-group">
                                <div class="form-row">
                                    <div class="col">
                                        <label for="">Dekat</label>
                                        <input type="text" class="form-control" placeholder="<?= $fuzzyj["dekat"]; ?>" disabled>
                                    </div>
                                    <div class="col">
                                        <label for="">Sedang</label>
                                        <input type="text" class="form-control" placeholder="<?= $fuzzyj["sedang"]; ?>" disabled>
                                    </div>
                                    <div class="col">
                                        <label for="">Jauh</label>
                                        <input type="text" class="form-control" placeholder="<?= $fuzzyj["jauh"]; ?>" disabled>
                                    </div>
                                </div>
                            </div>
                            <label for="">Fuzzy Gaji</label>
                            <div class="form-group">
                                <div class="form-row">
                                    <div class="col">
                                        <label for="">Sedikit</label>
                                        <input type="text" class="form-control" placeholder="<?= $fuzzyg["sedikit"]; ?>" disabled>
                                    </div>
                                    <div class="col">
                                        <label for="">Cukup</label>
                                        <input type="text" class="form-control" placeholder="<?= $fuzzyg["cukup"]; ?>" disabled>
                                    </div>
                                    <div class="col">
                                        <label for="">Besar</label>
                                        <input type="text" class="form-control" placeholder="<?= $fuzzyg["besar"]; ?>" disabled>
                                    </div>
                                </div>
                            </div>
                            <label for="">Inferensi</label>
                            <div class="form-group">
                                <div class="form-row">
                                    <div class="col">
                                        <label for="">Layak</label>
                                        <input type="text" class="form-control" placeholder="<?= $inf["layak"]; ?>" disabled>
                                        <a href="inferensi.php?id=<?= $row["id_user"]; ?>" class="badge badge-primary">Hitung Inferensi</a>
                                    </div>
                                    <div class="col">
                                        <label for="">Tidak Layak</label>
                                        <input type="text" class="form-control" placeholder="<?= $inf["tidak_layak"]; ?>" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Defuzzifikasi</label>
                                <input type="text" class="form-control" placeholder="<?= $defuzz["nilai"]; ?>" disabled>
                                <a href="defuzzifikasi.php?id=<?= $row["id_user"]; ?>" class="badge badge-primary">Hitung Defuzzifikasi</a>
                            </div>
                            <a href="terima.php?id=<?= $row["id_user"]; ?>" class="badge badge-success">TERIMA</a>
                            <a href="tolak.php?id=<?= $row["id_user"]; ?>" class="badge badge-danger">TOLAK</a>
                            <br>
                        </form>
                    </div>


                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2019</span>
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
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Apakah kamu yakin ingin keluar?.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>