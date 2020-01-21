<?php

session_start();

require('config.php');

$idTuit = $_POST['idTuit'];



$yo = $_SESSION['username'];



$sql12345 = "delete from tuits where idTuitOriginal = '$idTuit'";

if (mysqli_query($con, $sql12345)) {}


$sql123456 = "delete from retuits where idTuitOriginal = '$idTuit'";

if (mysqli_query($con, $sql123456)) {}


$sql1234567 = "delete from megustas where idTuitOriginal = '$idTuit'";

if (mysqli_query($con, $sql1234567)) {}


?>