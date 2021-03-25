<?php

$conn = mysqli_connect("localhost", "root", "", "ai-sekolah");

function registrasi($data)
{
    global $conn;
    $nama = $data["nama"];
    $email = $data["email"];
    $gender = $data["gender"];
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $birthday = $data["birthday"];
    $phone = $data["phone"];
    $jalur = $data["jalur"];
    $jurusan = $data["jurusan"];
    $jarak = $data["jarak"];
    $gaji = $data["gaji"];
    $status = "Waiting";
    $role = 2;
    $nilai_mtk = $data["nilai_mtk"];
    $nilai_indo = $data["nilai_indo"];
    $nilai_inggris = $data["nilai_inggris"];

    $password = password_hash($password, PASSWORD_DEFAULT);

    mysqli_query($conn, "INSERT INTO user VALUES('','$nama','$email','$gender','$password',
                '$birthday','$phone','$jalur','$jurusan','$jarak','$gaji','$status','$role')");

    $query = mysqli_query($conn, "SELECT * FROM user WHERE nama='$nama'");
    $row = mysqli_fetch_assoc($query);
    $id = $row["id_user"];

    mysqli_query($conn, "INSERT INTO nilai VALUES('','$id','$nilai_mtk','$nilai_indo','$nilai_inggris')");

    return mysqli_affected_rows($conn);
}

function cari($keyword)
{
    global $conn;
    $query = mysqli_query($conn, "SELECT * FROM user WHERE nama LIKE '%$keyword%'");
    return $query;
}
