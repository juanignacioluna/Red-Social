<?php

session_start();

$idTuit = $_POST['idTuit'];



$yo = $_SESSION['username'];

require('config.php');

$sql123 = "select rtSiOno from tuits where id='$idTuit'";
$result123 = mysqli_query($con,$sql123);
$row123 = mysqli_fetch_array($result123);

$rtBool = $row123[0];

$sql71 = "select idTuitOriginal from tuits where id = '".$idTuit."'";
$result71 = mysqli_query($con,$sql71);
$row71 = mysqli_fetch_array($result71);

$idaa = $row71[0];


if ($rtBool == 0) {


    $sql1234 = "select * from retuits where idTuitOriginal='$idTuit' and usuario='$yo'";
    $result1234 = mysqli_query($con,$sql1234);

    if (mysqli_num_rows($result1234) > 0){

            $sql12345 = "delete from retuits where idTuitOriginal = '$idTuit' and usuario='$yo'";

            if (mysqli_query($con, $sql12345)) {}

            $sql7 = "select idTuitOriginal from tuits where id = '".$idTuit."'";
            $result7 = mysqli_query($con,$sql7);
            $row7 = mysqli_fetch_array($result7);
    
            $r7 = $row7[0];
    
    
            $sql123456 = "update tuits set rt = rt - 1 where idTuitOriginal = '".$r7."'";
            
    
            if (mysqli_query($con, $sql123456)) {}

            $sql99999 = "delete from tuits where (rtPOR = '$yo' and idTuitOriginal = '$idTuit')";

            if (mysqli_query($con, $sql99999)) {}


    }else{

        include('config.php');


        $sql12345 = "insert into retuits (usuario, idTuitOriginal) values ('$yo', '$idTuit')";

        if (mysqli_query($con, $sql12345)) {}


        $sql7 = "select idTuitOriginal from tuits where id = '".$idTuit."'";
        $result7 = mysqli_query($con,$sql7);
        $row7 = mysqli_fetch_array($result7);

        $r7 = $row7[0];


        $sql123456 = "update tuits set rt = rt + 1 where idTuitOriginal = '".$r7."'";
        

        if (mysqli_query($con, $sql123456)) {}



        $sql4 = "SELECT * from tuits where id = '$idTuit'";
        $result4 = mysqli_query($con, $sql4);
        $row4 = mysqli_fetch_array($result4);

        $userT = $row4['usuario'];
        $tuitT = $row4['tuit'];
        $mgT = $row4['mg'];
        $rtT = $row4['rt'];

        $sql12345 = "insert into tuits (usuario, tuit, rt, mg, rtSiOno, rtPOR, idTuitOriginal) values ('$userT', '$tuitT', '$rtT', '$mgT', 1, '$yo', '$idTuit')";

        if (mysqli_query($con, $sql12345)) {}





        include('config.php');

        $sql5000 = "insert into notis (receptor, emisor, seguidorNuevo, likeAtuit, likeART, rtAtuit, rtART, idTuit) values ('$userT' , '$yo', 0, 0, 0, 1, 0, '$idTuit')";

        if (mysqli_query($con, $sql5000)) {}




    }




}else{

    $sql1234 = "select * from retuits where idTuitOriginal in (select idTuitOriginal from tuits where id = '".$idTuit."') and usuario='$yo'";
    $result1234 = mysqli_query($con,$sql1234);

    if (mysqli_num_rows($result1234) > 0){



        $sql12345 = "delete from retuits where idTuitOriginal in (select idTuitOriginal from tuits where id = '".$idTuit."') and usuario='$yo'";

        if (mysqli_query($con, $sql12345)) {}


        $sql7 = "select idTuitOriginal from tuits where id = '".$idTuit."'";
        $result7 = mysqli_query($con,$sql7);
        $row7 = mysqli_fetch_array($result7);

        $r7 = $row7[0];


        $sql123456 = "update tuits set rt = rt - 1 where idTuitOriginal = '".$r7."'";
        

        if (mysqli_query($con, $sql123456)) {}


        $sql99999 = "delete from tuits where (idTuitOriginal = '".$r7."' and rtPOR='".$yo."')";

        if (mysqli_query($con, $sql99999)) {}





    }else{

        $sql7 = "select idTuitOriginal from tuits where id='$idTuit'";
        $result7 = mysqli_query($con,$sql7);
        $row7 = mysqli_fetch_array($result7);

        $idTuitOriginal = $row7[0];



        $sql12345 = "insert into retuits (usuario, idTuitOriginal) values ('$yo', '$idTuitOriginal')";

        if (mysqli_query($con, $sql12345)) {}


        $sql7 = "select idTuitOriginal from tuits where id = '".$idTuit."'";
        $result7 = mysqli_query($con,$sql7);
        $row7 = mysqli_fetch_array($result7);

        $r7 = $row7[0];


        $sql123456 = "update tuits set rt = rt + 1 where idTuitOriginal = '".$r7."'";
        

        if (mysqli_query($con, $sql123456)) {}


        $sql4 = "SELECT * from tuits where id in (select idTuitOriginal from tuits where id = '$idTuit')";
        $result4 = mysqli_query($con, $sql4);
        $row4 = mysqli_fetch_array($result4);

        $userT = $row4['usuario'];
        $tuitT = $row4['tuit'];
        $mgT = $row4['mg'];
        $rtT = $row4['rt'];
        $idT = $row4['id'];

        $sql12345 = "insert into tuits (usuario, tuit, rt, mg, rtSiOno, rtPOR, idTuitOriginal) values ('$userT', '$tuitT', '$rtT', '$mgT', 1, '$yo', '$idT')";

        if (mysqli_query($con, $sql12345)) {}














        $sql52 = "select rtPOR from tuits where id='$idTuit'";
        $result52 = mysqli_query($con,$sql52);
        $row52 = mysqli_fetch_array($result52);

        $rtPOR = $row52[0];

        include('config.php');

        $sql5000 = "insert into notis (receptor, emisor, seguidorNuevo, likeAtuit, likeART, rtAtuit, rtART, idTuit) values ('$rtPOR' , '$yo', 0, 0, 0, 0, 1, '$idTuit')";

        if (mysqli_query($con, $sql5000)) {}


        $sql5001 = "select usuario from tuits where id='$idTuit'";
        $result5001 = mysqli_query($con,$sql5001);
        $row5001 = mysqli_fetch_array($result5001);

        $userTUIT = $row5001[0];

        include('config.php');

        $sql5002 = "insert into notis (receptor, emisor, seguidorNuevo, likeAtuit, likeART, rtAtuit, rtART, idTuit) values ('$userTUIT' , '$yo', 0, 0, 0, 1, 0, '$idTuit')";

        if (mysqli_query($con, $sql5002)) {}




    }




}

    require('config.php');


    $sql9 = "SELECT * from tuits where id = '$idaa'";
    $result9 = mysqli_query($con, $sql9);

    $row9 = mysqli_fetch_array($result9);

    echo $row9['rt'];



?>