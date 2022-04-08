<?php
$date = date('d-m-Y');
if (isset($_POST['masuk'])) {
    $cookie_nama = $_POST['name'];
    $cookie_kunjungan = 1;
    $cookie_date = date('d-m-Y');
    setcookie('nama', $cookie_nama, time() + 3 * 30 * 24 * 60 * 60);
    setcookie('tanggal', $cookie_date, time() + 3 * 30 * 24 * 60 * 60);
    setcookie('kunjungan', $cookie_kunjungan, time() + 3 * 30 * 24 * 60 * 60);
    // header('Location: tujuan.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cookie</title>
</head>

<body>
    <?php if (!isset($_COOKIE['nama'])) { ?>
        <form action="" method="POST">
            <div>
                <label for="name">Masukkan Nama Anda</label>
                <input type="text" name="name" id="name">
            </div>
            <div>
                <button type="submit" name="masuk">Masuk</button>
            </div>
        </form>
    <?php } else {
        if ($_COOKIE['tanggal'] < $date) {
            $count = $cookie_kunjungan++;
            setcookie('tanggalbefore', $_COOKIE['tanggal'], time() + 3 * 30 * 24 * 60 * 60);
            setcookie('tanggal', $date, time() + 3 * 30 * 24 * 60 * 60);
            setcookie('kunjungan', $count, time() + 3 * 30 * 24 * 60 * 60);
        }
    ?>
    <?php
    } ?>

    <?php if ($count > 1) { ?>
        <p>Ini adalah kunjungan anda yang ke <?= $_COOKIE['kunjungan'] ?> pada tanggal <?= $_COOKIE['tanggal'] ?> kunjungan sebelumnya pada <?= $_COOKIE['tanggalbefore'] ?></p>
    <?php } else { ?>
        <p>Selamat datang, <?= $_COOKIE['nama']; ?> pada tanggal <?= $_COOKIE['tanggal']; ?>, ini adalah kunjungan anda yang <?= $_COOKIE['kunjungan']; ?></p>
    <?php } ?>
</body>

</html>