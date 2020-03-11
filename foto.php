<?php

session_start();

$nombre_archivo =  $_FILES['fileFoto']['name'];
$tipo_archivo = $_FILES['fileFoto']['type'];
$tamano_archivo = $_FILES['fileFoto']['size'];
$uploads_dir = 'fotos/perfil';

if(move_uploaded_file($_FILES['fileFoto']['tmp_name'], "$uploads_dir/$nombre_archivo")){



            include('config.php'); 

            $sql3="update personal set imagen = '$uploads_dir/$nombre_archivo' where usuario='".$_SESSION['username']."'";

            if (mysqli_query($con, $sql3)){


            }

            



}

header("Location: perfil.php");







?>
