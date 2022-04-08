<?php
session_start();
$rand = $_POST['random'] = $_SESSION['random']; 

$tebakan = $_POST['tebakan'];

if(isset($_POST['random'])){
    if($tebakan < $rand){
        echo "Tebakan Anda Terlalu Kecil";
    }
    else if($tebakan > $rand){
        echo "Tebakan Anda Terlalu Besar";
    }
    else if($tebakan == $rand){
        echo "Tebakan Anda Benarrr";
        unset($_SESSION['random']);
    }
} else{
    echo "aowoksowksowkowkdk";
}

?>