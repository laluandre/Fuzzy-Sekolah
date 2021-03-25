<?php

$conn = mysqli_connect("localhost", "root", "", "ai-sekolah");

$id = $_GET["id"];
/*$result = mysqli_query($conn, "SELECT * FROM user WHERE id_user='$id'");

$row = mysqli_fetch_assoc($result); */
$status = "Diterima";

mysqli_query($conn, "UPDATE user SET status='$status' WHERE id_user='$id'");

header("Location: calon.php");
