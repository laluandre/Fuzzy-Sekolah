<?php

$conn = mysqli_connect("localhost", "root", "", "ai-sekolah");

$id = $_GET["id"];
$status = "Ditolak";

mysqli_query($conn, "UPDATE user SET status='$status' WHERE id_user='$id'");

header("Location: calon.php");
