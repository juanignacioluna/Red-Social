<?php

    session_start(); 


    $tuit=$_POST['ttww'];  
    $user = $_SESSION['username'];

    include('config.php');

    $sql7= "insert into tuits (usuario, tuit, rt, mg) values ('$user', '$tuit', 0, 0)";

    if (mysqli_query($con, $sql7)) {
    }


    $sql_query = "select id from tuits order by id desc limit 1";
    $result = mysqli_query($con,$sql_query);
    $row = mysqli_fetch_array($result);

    $img = $row[0];


    include('config.php');

    $sql75= "update tuits set idTuitOriginal = '$img' where id= '$img'";

    if (mysqli_query($con, $sql75)) {
    }

    header("Location: perfil.php");





?>