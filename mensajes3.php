<?php

session_start();

$idChat = $_POST['idChat'];

$mensaje = $_POST['mensaje'];



$yo = $_SESSION['username'];


include('config.php');


$sql55 = "select * from chats where id ='".$idChat."' ";
$result55 = mysqli_query($con,$sql55);

$row55 = mysqli_fetch_array($result55);

if(!strcasecmp($row55['usuario1'], $yo)){

    $receptor = $row55['usuario2'];


}else{


    $receptor = $row55['usuario1'];



}


$sql12345 = "insert into mensajes (mensaje, emisor, receptor, idChat) values ('$mensaje', '$yo', '$receptor', '$idChat')";

if (mysqli_query($con, $sql12345)) {}


echo "<div class='outgoing_msg'>
<div class='sent_msg'>
    <p>" . $mensaje . "</p>
     </div>
</div>";









?>