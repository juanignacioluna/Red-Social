<?php

session_start();

$nombre_archivo =  $_FILES['fileFoto']['name'];
$tipo_archivo = $_FILES['fileFoto']['type'];
$tamano_archivo = $_FILES['fileFoto']['size'];
$uploads_dir = 'fotos/perfil';

if(move_uploaded_file($_FILES['fileFoto']['tmp_name'], "$uploads_dir/$nombre_archivo")){

            // echo "<li class='clearAfter' id='$uploads_dir/$nombre_archivo'>
            // <span class='photo' style='background: url(photos/".$_FILES['ig']['name'].")'></span>
            // <input type='hidden' id='h' name='h' value='$uploads_dir/$nombre_archivo'>
            // <a href='#' class='delete'>Eliminar</a>
            // <a href='#' class='sort'>Ordenar</a></li>";



            include('config.php'); 

            $sql3="update personal set imagen = '$uploads_dir/$nombre_archivo' where usuario='".$_SESSION['username']."'";

            if (mysqli_query($con, $sql3)){


            }

            



}

header("Location: perfil.php");







?>