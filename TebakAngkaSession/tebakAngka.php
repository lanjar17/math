<?php

session_start();
if (!isset($_SESSION['random'])){
    $_SESSION['random']=rand(0, 100);
}
$rand = intval($_SESSION['random']);
echo $rand;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game Tebak Angka</title>
</head>
<body>
    <form action="tebak.php" method="POST">
        Silahkan Masukkan Tebakan Anda (1-100): <input type="text" name="tebakan">
        <button name="submit">Tebak</button>
    </form>

    
</body>
</html>