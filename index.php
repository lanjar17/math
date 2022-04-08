<?php
session_start();
if (isset($_COOKIE['username'])) {
    $ada = true;
} else {
    $ada = false;
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

    <title>Tebak Angka</title>
</head>

<body>
    <center>
        <h2>Game Tebak Angka</h2>
        <br>
        <div class="container-fluid">
            <form class="form-inline" action="hasil.php" method="post">
                <?php
                    if ($ada == false) {
                ?>
                    <label for="user" class="mr-sm-2">Username</label>
                    <input type="text" class="form-control mb-2 mr-sm-2" placeholder="Kenalan dong..." id="name" name="username">
                    <button type="submit" name="submit1" class="btn btn-primary mb-2" value="Gass">Main</button>
                <?php
                    } else {
                        echo "<p></p>Selamat Datang Lagi mas " . $_COOKIE['username'] . "</p>";
                        echo "<p>Kamu pernah kesini nih, tanggal " . $_COOKIE['tanggal'] . " dengan skor " . $_COOKIE['skor'];
                
                ?>
                    <br><button type="submit" name="submit2" class="btn btn-primary mb-2" value="Gasss">Main</button>
                <?php
                    }
                ?>


                <!-- // $first = rand(0, 100);
                // $second = rand(0, 100);
                // $_SESSION['hasil'] = $first + $second;

                // //menyambut
                // echo "<h2>Wehh, haloo ".$_SESSION['nama']."</h2>
                // <p>Lives ".$_SESSION["lives"] . "</p>
                // <p>Skor ".$_SESSION["skor"] . "</p>";
                // echo "<label for=jawab>" . $first . "+" . $second . "= </label>";

                // ?>
                // <label for="user" class="mr-sm-2">Username</label>
                // <input type="text" class="form-control mb-2 mr-sm-2" placeholder="Kenalan dong..." id="name"> -->
                
                <!-- <div class="form-check mb-2 mr-sm-2">
            //     <label class="form-check-label">
            //         <input class="form-check-input" type="checkbox"> Remember me
            //     </label>
            // </div> -->
                <!-- // <button type="submit" class="btn btn-primary mb-2">Main</button> -->
            </form>
            <?php
            $_SESSION['lives'] = 5;
            $_SESSION['skor'] = 0;
            ?>

        </div>

    </center>















    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>