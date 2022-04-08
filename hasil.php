<?php
session_start();

$first = rand(0, 10);
$second = rand(0, 10);

if (isset($_POST['submit1'])) {
    setcookie('username', $_POST['username'], time() + 3600 * 24 * 7);
    header("Location: hasil.php");
}

// jika hasil.php ini diload dari tombol submit (dari halaman action.php sendiri)
if (isset($_POST['submit'])) {
    if ($_POST['firstnumber'] + $_POST['secondnumber'] == $_POST['hasil']) {
        $_SESSION['skor'] += 10;
        $ada = true;
    } else {
        $_SESSION['skor'] -= 2;
        $_SESSION['lives'] -= 1;
        $ada = false;
    }
}

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>AYoooo Ditebakk</title>
</head>

<body>
    <center>
        <h5>Hayo Jawabannya Berapa</h5>

        <!-- menampilkan nama, nyawa, dan skor -->
        <?php
        echo "<h2>Wehh, haloo " . $_COOKIE['username'] . "</h2>
        <p>Lives " . $_SESSION['lives'] . "</p>
        <p>Skor " . $_SESSION['skor'] . "</p>";

        

        
        //mengecek jawaban
        if (isset($ada)) {
            if ($ada == true) {
                echo "<allert>Mantappp</allert>";
            } else {
                echo "<allert>Ayoo coba lagi !!</allert>";
            }
        }
        

        
        //game over
        if ($_SESSION['lives'] == 0) {
            echo "<h2>Game Selesai</h2>";
            echo "<a class='btn btn-primary mb-2' href='index.php'>Main lagi yokk</a>";
            echo "<button class='btn btn-succes mb-2' href='leadherboard.php'>Cek Leaderboard</button>";

            setcookie('skor', $_SESSION['skor'], time() + 3600 * 24 * 7);
            setcookie('tanggal', date('d/m/Y H:i'), time() + 3600 * 24 * 7);

            include("koneksi.php");
            $query = "INSERT INTO math (username, skor, tanggal) VALUES ('" . $_COOKIE['username'] . "', " . $_SESSION['skor'] . ", '" . date('Y-m-d H:i:s') . "')";
            $hasil = mysqli_query($koneksi, $query);
        } else {
        ?>
        
            <form method="post" action="hasil.php">
                <?php
                // munculkan kedua bilangan random x dan y
                echo "$first + $second = ";
                ?>
                <input type="hidden" name="firstnumber" value="<?php echo $first; ?>">
                <input type="hidden" name="secondnumber" value="<?php echo $second; ?>">
                <input type="text" name="hasil">
                <input type="submit" name="submit">
            </form>
        <?php
        }
        ?>
    </center>



   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>