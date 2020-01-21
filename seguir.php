<?php

session_start();

$user = $_POST['data'];


// echo $user;

$u = $_SESSION['username'];


require('config.php');

$sql = "SELECT esteUsuario, sigueAa from seguidores where esteUsuario = '$u' and sigueAa='$user'";
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {

    include('config.php'); 

    $sql_200 = "update personal set siguiendo = siguiendo - 1 where usuario='".$u."'";
    

    if (mysqli_query($con, $sql_200)) {}

    include('config.php'); 

    $sql_300 = "update personal set seguidores = seguidores - 1 where usuario='".$user."'";
    

    if (mysqli_query($con, $sql_300)) {}

    include('config.php');

    $sql20 = "delete from seguidores where esteUsuario = '$u' and sigueAa='$user'";

    if (mysqli_query($con, $sql20)) {}

    } else {


        include('config.php'); 

        $sql_200 = "update personal set siguiendo = siguiendo + 1 where usuario='".$u."'";
        

        if (mysqli_query($con, $sql_200)) {}

        include('config.php'); 

        $sql_300 = "update personal set seguidores = seguidores + 1 where usuario='".$user."'";
        

        if (mysqli_query($con, $sql_300)) {}


        include('config.php');

        $sql200 = "insert into seguidores (esteUsuario, sigueAa) values ('$u' , '$user')";

        if (mysqli_query($con, $sql200)) {}


        include('config.php');

        $sql5000 = "insert into notis (receptor, emisor, seguidorNuevo, likeAtuit, likeART, rtAtuit, rtART) values ('$user' , '$u', 1, 0, 0, 0, 0)";

        if (mysqli_query($con, $sql5000)) {}

    }






?>