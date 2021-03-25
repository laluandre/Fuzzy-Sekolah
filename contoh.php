<?php

$conn = mysqli_connect('localhost', 'root', '', 'ai-sekolah');

$query = mysqli_query($conn, "SELECT * FROM user");
$baru = mysqli_query($conn, "SELECT * FROM jam");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="tes.php" method="POST">
        <select name="nan" id="aa">
            <?php while ($result = mysqli_fetch_assoc($query)) : ?>
                <?php $id = $result['id_user'];
                $hasil = mysqli_query($conn, "SELECT * FROM nilai WHERE id_user='$id'");
                $nilai = mysqli_fetch_assoc($hasil);
                ?>
                <option value="<?= $nilai['matematika']; ?>"><?= $result['nama']; ?></option>
            <?php endwhile; ?>
        </select>
        <button type="submit">TES</button>
    </form>
</body>

</html>

<?php

while ($coba = mysqli_fetch_assoc($baru)) :
    if ($coba['id'] >= 2 && $coba['id'] <= 4) {
        echo "nama ";
    }
endwhile;
