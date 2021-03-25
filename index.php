<?php
require 'function.php';

if (isset($_POST["daftar"])) {
    if (registrasi($_POST) > 0) {
        echo "<script>
            alert('User Berhasil Ditambahkan!');
            window.location.replace('login.php');
            </script>";
    }
} else {
    echo mysqli_error($conn);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Registration Form</title>

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body">
                    <h2 class="title">Form Registrasi Sekolah Menengah</h2>
                    <form action="" method="POST">
                        <div class="col-1">
                            <div class="input-group">
                                <label class="label">Nama Lengkap</label>
                                <input class="input--style-4" type="text" name="nama" required>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Tanggal Lahir</label>
                                    <div class="input-group-icon">
                                        <input class="input--style-4 js-datepicker" type="text" name="birthday" required>
                                        <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Jenis Kelamin</label>
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="gender" required>
                                            <option disabled="disabled" selected="selected">Pilih Jenis Kelamin</option>
                                            <option value="Laki-Laki">Laki-Laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Email</label>
                                    <input class="input--style-4" type="email" name="email" required>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">No. Handphone</label>
                                    <input class="input--style-4" type="text" name="phone" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-1">
                            <div class="input-group">
                                <label class="label">Password</label>
                                <input class="input--style-4" type="password" name="password" required>
                            </div>
                        </div>
                        <div class="input-group">
                            <label class="label">Jalur Pendaftaran</label>
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="jalur" required>
                                    <option disabled="disabled" selected="selected">Pilih Jalur</option>
                                    <option value="JPA">Jalur Prestasi Akademik (JPA)</option>
                                    <option value="JPU">Jalur Prestasi Umum (JPU)</option>
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                        </div>
                        <div class="input-group">
                            <label class="label">Jurusan yang diinginkan</label>
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="jurusan" required>
                                    <option disabled="disabled" selected="selected">Pilih Jurusan</option>
                                    <option value="IPA">Ilmu Pengetahuan Alam (IPA)</option>
                                    <option value="IPS">Ilmu Pengetahuan Sosial (IPS)</option>
                                    <option value="Bahasa">Bahasa</option>
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                        </div>
                        <div class="input-group">
                            <div class="row row-space">
                                <div class="col-2">
                                    <div class="input-group">
                                        <label class="label">Nilai Matematika</label>
                                        <input class="input--style-4" type="number" name="nilai_mtk" min="0" max="100" required>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="input-group">
                                        <label class="label">Nilai Bhs Indonesia</label>
                                        <input class="input--style-4" type="number" name="nilai_indo" min="0" max="100" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="input-group">
                            <div class="row row-space">
                                <div class="col-2">
                                    <div class="input-group">
                                        <label class="label">Nilai Bhs Inggris</label>
                                        <input class="input--style-4" type="number" name="nilai_inggris" min="0" max="100" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="input-group">
                            <div class="col-1">
                                <div class="input-group">
                                    <label class="label">Jarak Rumah dari Sekolah (KM)</label>
                                    <input class="input--style-4" type="text" name="jarak" required>
                                </div>
                            </div>
                        </div>
                        <div class="input-group">
                            <div class="input-group">
                                <label class="label">Gaji Orang Tua (Juta)</label>
                                <input class="input--style-4" type="text" name="gaji" required>
                            </div>
                        </div>
                        <div class="p-t-15">
                            <button class="btn btn--radius-2 btn--blue" name="daftar" type="submit">Daftar</button>
                        </div>
                    </form>
                    <br><br>
                    <p>Sudah mempunyai akun? <a href="login.php">Masuk disini</a></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->