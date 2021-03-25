<?php
$conn = mysqli_connect("localhost", "root", "", "ai-sekolah");

$id = $_GET["id"];
$jarak = mysqli_query($conn, "SELECT * FROM fuzzy_jarak WHERE id_user='$id'");
$jarak = mysqli_fetch_assoc($jarak);
$nilai = mysqli_query($conn, "SELECT * FROM fuzzy_nilai WHERE id_user='$id'");
$nilai = mysqli_fetch_assoc($nilai);
$gaji = mysqli_query($conn, "SELECT * FROM fuzzy_gaji WHERE id_user='$id'");
$gaji = mysqli_fetch_assoc($gaji);


$inf_n = [$nilai["buruk"], $nilai["sedang"], $nilai["bagus"]];
$inf_j = [$jarak["jauh"], $jarak["sedang"], $jarak["dekat"]];
$inf_g = [$gaji["besar"], $gaji["cukup"], $gaji["sedikit"]];

$n = 0;
$inn = 0;
$cek = mysqli_query($conn, "SELECT * FROM inferensi WHERE id_user='$id'");

while ($cek = mysqli_fetch_assoc($cek)) {
    if ($id = $cek["id_user"]) {
        $inn = 1;
    }
}

if ($inn == 1) {
    header("Location: lihat.php?id=$id");
}

for ($i = 0; $i < 3; $i++) {
    for ($j = 0; $j < 3; $j++) {
        for ($k = 0; $k < 3; $k++) {
            if ($inf_n[$i] > 0 && $inf_j[$j] > 0 && $inf_g[$k] > 0) {
                if ($inf_n[$i] <  $inf_j[$j] && $inf_n[$i] < $inf_g[$k]) {
                    $nilai_kondisi[$n] = $inf_n[$i];
                } else if ($inf_j[$j] < $inf_n[$i] && $inf_j[$j] < $inf_g[$k]) {
                    $nilai_kondisi[$n] = $inf_j[$j];
                } else if ($inf_g[$k] < $inf_n[$i] && $inf_g[$k] < $inf_j[$j]) {
                    $nilai_kondisi[$n] = $inf_g[$k];
                } else if ($inf_n[$i] == $inf_j[$j] && $inf_n[$i] == $inf_g[$k]) {
                    $nilai_kondisi[$n] = $inf_n[$i];
                }

                if ($i == 0 && $j == 0 && $k == 0) { //Rule 1
                    $kondisi[$n] = "TIDAK LAYAK";
                } else if ($i == 0 && $j == 0 && $k == 1) { //Rule 2
                    $kondisi[$n] = "TIDAK LAYAK";
                } else if ($i == 0 && $j == 0 && $k == 2) { //Rule 3
                    $kondisi[$n] = "TIDAK LAYAK";
                } else if ($i == 0 && $j == 1 && $k == 0) { //Rule 4
                    $kondisi[$n] = "TIDAK LAYAK";
                } else if ($i == 0 && $j == 1 && $k == 1) { //Rule 5
                    $kondisi[$n] = "TIDAK LAYAK";
                } else if ($i == 0 && $j == 1 && $k == 2) { //Rule 6
                    $kondisi[$n] = "LAYAK";
                } else if ($i == 0 && $j == 2 && $k == 0) { //Rule 7 
                    $kondisi[$n] = "LAYAK";
                } else if ($i == 0 && $j == 2 && $k == 1) { //Rule 8
                    $kondisi[$n] = "TIDAK LAYAK";
                } else if ($i == 0 && $j == 2 && $k == 2) { //Rule 9
                    $kondisi[$n] = "LAYAK";
                } else if ($i == 1 && $j == 0 && $k == 0) { //Rule 10
                    $kondisi[$n] = "TIDAK LAYAK";
                } else if ($i == 1 && $j == 0 && $k == 1) { //Rule 11
                    $kondisi[$n] = "TIDAK LAYAK";
                } else if ($i == 1 && $j == 0 && $k == 2) { //Rule 12
                    $kondisi[$n] = "TIDAK LAYAK";
                } else if ($i == 1 && $j == 1 && $k == 0) { //Rule 13
                    $kondisi[$n] = "LAYAK";
                } else if ($i == 1 && $j == 1 && $k == 1) { //Rule 14
                    $kondisi[$n] = "LAYAK";
                } else if ($i == 1 && $j == 1 && $k == 2) { //Rule 15
                    $kondisi[$n] = "LAYAK";
                } else if ($i == 1 && $j == 2 && $k == 0) { //Rule 16
                    $kondisi[$n] = "LAYAK";
                } else if ($i == 1 && $j == 2 && $k == 1) { //Rule 17
                    $kondisi[$n] = "LAYAK";
                } else if ($i == 1 && $j == 2 && $k == 2) { //Rule 18
                    $kondisi[$n] = "LAYAK";
                } else if ($i == 2 && $j == 0 && $k == 0) { //Rule 19
                    $kondisi[$n] = "TIDAK LAYAK";
                } else if ($i == 2 && $j == 0 && $k == 1) { //Rule 20
                    $kondisi[$n] = "LAYAK";
                } else if ($i == 2 && $j == 0 && $k == 2) { //Rule 21
                    $kondisi[$n] = "LAYAK";
                } else if ($i == 2 && $j == 1 && $k == 0) { //Rule 22
                    $kondisi[$n] = "LAYAK";
                } else if ($i == 2 && $j == 1 && $k == 1) { //Rule 23
                    $kondisi[$n] = "LAYAK";
                } else if ($i == 2 && $j == 1 && $k == 2) { //Rule 24
                    $kondisi[$n] = "LAYAK";
                } else if ($i == 2 && $j == 2 && $k == 0) { //Rule 25
                    $kondisi[$n] = "LAYAK";
                } else if ($i == 2 && $j == 2 && $k == 1) { //Rule 26
                    $kondisi[$n] = "LAYAK";
                } else if ($i == 2 && $j == 2 && $k == 2) { //Rule 27
                    $kondisi[$n] = "LAYAK";
                }
                $n = $n + 1;
            }
        }
    }
}

$nilai_kondisi_fix_l = 0;
$nilai_kondisi_fix_tl = 0;
$kondisi_fix_l = "";
$kondisi_fix_l = "";
for ($a = 0; $a < $n; $a++) {
    if ($kondisi[$a] == "LAYAK") {
        if ($nilai_kondisi_fix_l < $nilai_kondisi[$a]) {
            $nilai_kondisi_fix_l = $nilai_kondisi[$a];
            $kondisi_fix_l = $kondisi[$a];
        }
    } else if ($kondisi[$a] == "TIDAK LAYAK") {
        if ($nilai_kondisi_fix_tl < $nilai_kondisi[$a]) {
            $nilai_kondisi_fix_tl = $nilai_kondisi[$a];
            $kondisi_fix_tl = $kondisi[$a];
        }
    }
}

mysqli_query($conn, "INSERT INTO inferensi VALUES('','$id','$nilai_kondisi_fix_l','$nilai_kondisi_fix_tl')");
header("Location: lihat.php?id=$id");
