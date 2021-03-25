<?php

$conn = mysqli_connect("localhost", "root", "", "ai-sekolah");
$id = $_GET["id"];
$inf = mysqli_query($conn, "SELECT * FROM inferensi WHERE id_user='$id'");
$inf = mysqli_fetch_assoc($inf);

$layak = $inf["layak"];
$tidak = $inf["tidak_layak"];
$syarat = mysqli_query($conn, "SELECT * FROM defuzzifikasi");

$inn = 0;
while ($cek = mysqli_fetch_assoc($syarat)) {
    if ($cek["id_user"] == $id) {
        $inn = 1;
    }
}

if ($inn == 1) {
    header("Location: lihat.php?id=$id");
}

$defuz = ((210 * $tidak) + (450 * $layak)) / (($tidak * 6) + ($layak * 6));
$defuz = number_format($defuz, 2);

mysqli_query($conn, "INSERT INTO defuzzifikasi VALUES('','$id','$defuz')");
header("Location: lihat.php?id=$id");
