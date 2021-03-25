<?php

$conn = mysqli_connect("localhost", "root", "", "ai-sekolah");
$id = $_GET["id"];

$query = mysqli_query($conn, "SELECT * FROM nilai WHERE id_user='$id'");
$row = mysqli_fetch_assoc($query);
$kueri = mysqli_query($conn, "SELECT * FROM user WHERE id_user='$id'");
$kueri = mysqli_fetch_assoc($kueri);
$gaji = $kueri["gaji"];
$jarak = $kueri["jarak"];
$nburuk = 0.00;
$nsedang = 0.00;
$nbagus = 0.00;
$gsedikit = 0.00;
$gcukup = 0.00;
$gbesar = 0.00;
$jdekat = 0.00;
$jsedang = 0.00;
$jjauh = 0.00;
$rata = $row["matematika"] + $row["bhs_indo"] + $row["bhs_inggris"];
$rata = $rata / 3;
$rata = number_format($rata, 2);

$syarat = mysqli_query($conn, "SELECT * FROM fuzzy_nilai");

$inn = 0;
while ($cek = mysqli_fetch_assoc($syarat)) {
    if ($cek["id_user"] == $id) {
        $inn = 1;
    }
}

if ($inn == 1) {
    header("Location: lihat.php?id=$id");
} else if ($inn == 0) {
    //FUZZY NILAI
    //Fuzzy BURUK
    if ($rata <= 50) {
        $buruk = 1.00;
    } else if ($rata > 50 && $rata < 60) {
        $buruk = ((60 - $rata) / 10);
    } else if ($rata >= 60) {
        $buruk = 0;
    }
    $buruk = number_format($buruk, 2);

    //Fuzzy SEDANG
    if ($rata <= 50 || $rata >= 85) {
        $sedang = 0;
    } else if ($rata > 50 && $rata < 70) {
        $sedang = (($rata - 50) / 20);
    } else if ($rata >= 70 && $rata <= 75) {
        $sedang = 1;
    } else if ($rata > 75 && $rata < 85) {
        $sedang = ((85 - $rata) / 10);
    }
    $sedang = number_format($sedang, 2);

    //Fuzzy BAGUS
    if ($rata <= 75) {
        $bagus = 0;
    } else if ($rata > 75 && $rata < 90) {
        $bagus = (($rata - 75) / 15);
    } else if ($rata >= 90) {
        $bagus = 1;
    }
    $bagus = number_format($bagus, 2);

    mysqli_query($conn, "INSERT INTO fuzzy_nilai VALUES('','$id','$buruk','$sedang','$bagus')");

    //FUZZY GAJI
    //Fuzzy SEDIKIT
    if ($gaji >= 4) {
        $gsedikit = 0;
    } else if ($gaji <= 2) {
        $gsedikit = 1;
    } else if ($gaji > 2 && $gaji < 4) {
        $gsedikit = ((4 - $gaji) / 2);
    }
    $gsedikit = number_format($gsedikit, 2);

    //Fuzzy CUKUP
    if ($gaji <= 2 || $gaji >= 9) {
        $gcukup = 0;
    } else if ($gaji > 2 && $gaji < 6) {
        $gcukup = (($gaji - 2) / 4);
    } else if ($gaji >= 6 && $gaji <= 8) {
        $gcukup = 1;
    } else if ($gaji > 8 && $gaji < 9) {
        $gcukup = ((9 - $gaji) / 1);
    }
    $gcukup = number_format($gcukup, 2);

    //Fuzzy BESAR
    if ($gaji <= 8) {
        $gbesar = 0;
    } else if ($gaji > 8 && $gaji < 11) {
        $gbesar = (($gaji - 8) / 3);
    } else if ($gaji >= 11) {
        $gbesar = 1;
    }
    $gbesar = number_format($gbesar, 2);

    mysqli_query($conn, "INSERT INTO fuzzy_gaji VALUES('','$id','$gsedikit','$gcukup','$gbesar')");

    //FUZZY JARAK
    //Fuzzy Dekat
    if ($jarak >= 7) {
        $jdekat = 0;
    } else if ($jarak <= 5) {
        $jdekat = 1;
    } else if ($jarak > 5 && $jarak < 7) {
        $jdekat = ((7 - $jarak) / 2);
    }
    $jdekat = number_format($jdekat, 2);

    //Fuzzy Sedang
    if ($jarak <= 5 || $jarak >= 12) {
        $jsedang = 0;
    } else if ($jarak > 5 && $jarak < 7) {
        $jsedang = (($jarak - 5) / 2);
    } else if ($jarak >= 7 && $jarak <= 9) {
        $jsedang = 1;
    } else if ($jarak > 9 && $jarak < 12) {
        $jsedang = (($jarak - 9) / 3);
    }
    $jsedang = number_format($jsedang, 2);

    //Fuzzy Jauh
    if ($jarak <= 9) {
        $jjauh = 0;
    } else if ($jarak > 9 && $jarak < 12) {
        $jjauh = (($jarak - 9) / 3);
    } else if ($jarak >= 11) {
        $jjauh = 1;
    }
    $jjauh = number_format($jjauh, 2);

    mysqli_query($conn, "INSERT INTO fuzzy_jarak VALUES('','$id','$jdekat','$jsedang','$jjauh')");

    header("Location: lihat.php?id=$id");
}
