<?php

session_start();

$idChat = $_POST['idChat'];



$yo = $_SESSION['username'];


include('config.php');


$sql55 = "select * from mensajes where idChat ='".$idChat."' order by id asc";
$result55 = mysqli_query($con,$sql55);


echo "<div id='chats' name='".$idChat."'>";



if (mysqli_num_rows($result55) > 0){


    while($row55 = mysqli_fetch_array($result55)){



        if(!strcasecmp($row55['emisor'], $yo)){

            $mensaje55=$row55['mensaje'];

            echo "<div class='outgoing_msg'>
            <div class='sent_msg'>
                <p>" . $mensaje55 . "</p>
                 </div>
            </div>";


        }else{

            $mensaje55=$row55['mensaje'];

            echo "<div class='incoming_msg'>
            <div class='received_msg'>
                <div class='received_withd_msg'>
                <p>" . $mensaje55 . "</p>
                </div>
            </div>
            </div>";


        }


    }


}



echo "</div>";







?>