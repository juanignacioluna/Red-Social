<?php

session_start();

if(isset($_SESSION['username']))
{
        // $logout = '<a href="logout.php"><button style="margin-top: 10%; margin-left: 0%;" type="button" class="btn btn-danger">LOGOUT</button></a>';
        $logout = "<li class='nav-item'><a class='nav-link' href='logout.php'>LOGOUT</a></li>";
}
else
{
        header("location:index.php");
}




?>

<!DOCTYPE html>
<html lang="en">
        <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <meta http-equiv="X-UA-Compatible" content="ie=edge">
                <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
                <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
                <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
                <link type="text/css" rel="stylesheet" href="timeline2.css">
                <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
                <title>SocialNET</title>
            </head>
<body>

        <script type="text/javascript">

            $(document).ready(function(){
            
                    var height = $(window).height();
            
                    $('#lateralUNO').height(height);

                    $('#lateralDOS').height(height);


                    $("#mg form").submit(function(e) {


                                var formObj = $(this);
                                var formURL = formObj.attr("action");
                                var formData = new FormData(this);

                                var idTuit = formObj.attr("id");


                                $.ajax({
                                url: formURL,
                                type: 'POST',
                                data: {idTuit : idTuit},
                                mimeType:"multipart/form-data",
                                success: function(data)
                                {


                                        


                                        if($("#" + idTuit + " input").attr("class")=="btn btn-danger"){

                                                $("#" + idTuit + " input").attr("class", "btn btn-info");


                                        }else{

                                                $("#" + idTuit + " input").attr("class", "btn btn-danger");


                                        }

                                        $("#" + idTuit + " input").attr("value", "" + data + " MG");

                                }         
                                });
                                e.preventDefault(); 



                                });



                                $("#borrar form").submit(function(e) {


                                        var formObj = $(this);
                                        var formURL = formObj.attr("action");
                                        var formData = new FormData(this);

                                        var idTuit = formObj.attr("name");


                                        $.ajax({
                                        url: formURL,
                                        type: 'POST',
                                        data: {idTuit : idTuit},
                                        mimeType:"multipart/form-data",
                                        success: function(data)
                                        {

                                                $( "." + idTuit + "" ).remove();


                                        }         
                                        });
                                        e.preventDefault(); 



                                        });





                                $("#rt form").submit(function(e) {


                                        var formObj = $(this);
                                        var formURL = formObj.attr("action");
                                        var formData = new FormData(this);

                                        var idTuit = formObj.attr("name");


                                        $.ajax({
                                        url: formURL,
                                        type: 'POST',
                                        data: {idTuit : idTuit},
                                        mimeType:"multipart/form-data",
                                        success: function(data)
                                        {


                                                if($("input[name ='" + idTuit + "']").attr("class")=="btn btn-success"){


                                                        

                                                        $("input[name ='" + idTuit + "']").attr("class", "btn btn-dark");


                                                }else{

                                                        $("input[name ='" + idTuit + "']").attr("class", "btn btn-success");


                                                }

                                                $("input[name ='" + idTuit + "']").attr("value", "" + data + " RTS");

                                        }         
                                        });
                                        e.preventDefault(); 



                                        });

                  
            });
            
        </script>

        <div class="container-fluid">

        <div class="row">

        <div id="navbar" class="col-sm">

                     <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                        <a class="navbar-brand" href="timeline.php">SocialNET</a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                                <a class="nav-link" href="#">Inicio</a>
                        </li>
                        <li class="nav-item">
                                <a class="nav-link" href="notis.php" >Notificaciones</a>
                        </li>
                        <li class="nav-item">
                                <a class="nav-link" href="mensajes.php">Mensajes</a>
                        </li>
                        <li class="nav-item">
                                <a class="nav-link" href="perfil.php">Perfil</a>
                        </li>
                        <?php


                        echo $logout;

                        ?>

                        </ul>

                        <form class="form-inline my-2 my-lg-0" action='tuitear.php' method='post' enctype='multipart/form-data'>

                        <input name="ttww" type="text" class="form-control mr-sm-2" placeholder="Escribe el tuit...">
                        <!-- <br></br> -->
                        <button style='margin-right:8px;' class="btn btn-info my-2 my-sm-0" type="submit">Tuitear</button>

                        </form>
                        <form action="buscar.php" id="buscarForm" method="POST" class="form-inline my-2 my-lg-0">
                                <input maxlength="255" autocomplete="off" name="busqueda" id="busqueda" class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Search">
                                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
                        </form>
                        </div>
                        </nav>

                        </div>
                        </div>
                <div class="row">
                        <div id="lateralUNO" class="col-lg col-1 lateral lateralUNO">



                        </div>
                        <div id="centro" class="col-lg col-10 centro">





                        <ul class="list-group">


                        <?php


                        $yo = $_SESSION['username'];

                        include('config.php'); 

                        $sql_query = "select sigueAa from seguidores where esteUsuario = '".$yo."' ";
                        $result = mysqli_query($con,$sql_query);
                        $row = mysqli_fetch_array($result);

                        



                        include('config.php'); 

                        
                        
                        $sql_query02 = "SELECT * FROM tuits WHERE (rtSiOno = 1 and rtPOR = '".$yo."') or (rtSiOno = 1 and rtPOR IN (select sigueAa from seguidores where esteUsuario = '".$yo."') ) or (rtSiOno = 0 and usuario = '".$yo."') or (rtSiOno = 0 and usuario IN (select sigueAa from seguidores where esteUsuario = '".$yo."')) order by id desc";
                        $result02 = mysqli_query($con,$sql_query02);








                        while($row02 = mysqli_fetch_array($result02)){



                                $idTuitOriginal = $row02['idTuitOriginal'];


                                if($row02['rtSiOno']==0){


                                        $classLI="list-group-item";

                                        $rt="";

                                        $style="";


                                        require('config.php');

                                        $yo = $_SESSION['username'];
                                        $idd=$row02['id'];
        
                                        $sql99 = "SELECT * from megustas where idTuitOriginal in (select idTuitOriginal from tuits where id = '".$idd."') and usuario='$yo'";
                                        $result99 = mysqli_query($con, $sql99);
        
                                        if (mysqli_num_rows($result99) > 0) {
                                                $clases="btn btn-info";
                                            } else {
                                                $clases="btn btn-danger";
                                            }
        
        
        
                                        require('config.php');
        
                                        $yo = $_SESSION['username'];
                                        $idd=$row02['id'];
            
                                        $sql992 = "SELECT * from retuits where idTuitOriginal in (select idTuitOriginal from tuits where id = '".$idd."') and usuario='$yo'";
                                        $result992 = mysqli_query($con, $sql992);
            
                                        if (mysqli_num_rows($result992) > 0) {
        
                                                        $clases2="btn btn-dark";
        
                                                } else {
        
                                                        $clases2="btn btn-success";
        
                                                }





                                }else{


                                        $classLI="list-group-item list-group-item-success";

                                        $rt="<span class='badge badge-pill badge-success'>@" . $row02['rtPOR']. " RETUITEO</span>

                                        <br></br>";

                                        $style="style='color: black;'";


                                        require('config.php');

                                        $yo = $_SESSION['username'];
                                        $idd=$row02['id'];
                                        
                                        $idTuitOriginal = $row02['idTuitOriginal'];
        
                                        $sql99 = "SELECT * from megustas where idTuitOriginal = '$idTuitOriginal' and usuario='$yo'";
                                        $result99 = mysqli_query($con, $sql99);
        
                                        if (mysqli_num_rows($result99) > 0) {
                                                $clases="btn btn-info";
                                            } else {
                                                $clases="btn btn-danger";
                                            }
        
        
        
                                        require('config.php');
        
                                        $yo = $_SESSION['username'];
                                        $idd=$row02['id'];

                                        $idTuitOriginal = $row02['idTuitOriginal'];
            
                                        $sql992 = "SELECT * from retuits where idTuitOriginal = '$idTuitOriginal' and usuario='$yo'";
                                        $result992 = mysqli_query($con, $sql992);
            
                                        if (mysqli_num_rows($result992) > 0) {
        
                                                        $clases2="btn btn-dark";
        
                                                } else {
        
                                                        $clases2="btn btn-success";
        
                                                }



                                } 

                                if((!strcasecmp($row02['usuario'], $yo))&&($row02['rtSiOno']==0)){

                                        $borrar="<div id='borrar'>

                                        <form id='borrarForm' name='" . $row02['id'] . "' method='post' action='borrar.php' enctype='multipart/form-data'>

                                        <button class='btn btn-danger' type='submit'><i class='fas fa-trash-alt'></i></button>
        
                                        </form>
        
                                        </div>";


                                }else{

                                        $borrar="";
                                        
                                }


                                $sql_query03 = "select imagen, nombreCompleto from personal where usuario='".$row02['usuario']."'";
                                $result03 = mysqli_query($con,$sql_query03);
                                $row03 = mysqli_fetch_array($result03);

                                $ruser=$row02['usuario'];


                                echo "<div class='" . $idTuitOriginal. "'><li class='" . $classLI. "'>

                                " . $rt. "


                                <div class='row'>
                                <div class='col-10'><a href='user.php?u=" . $ruser . "'><img class='fox' src='" . $row03[0]. "' alt='foto de perfil'></img></a></div>
                                <div class='col-2'>
                                
                                
                                

                                " . $borrar . "
                                
                                
                                </div>
                                </div>
                                

                                <div " . $style. ">" . $row03[1]. "</div>

                                <div " . $style. ">@" . $row02['usuario']. "</div>

                                <div " . $style. ">". $row02['tuit'] . "</div>

                                <div id='rt'>

                                <form id='rtForm' name='" . $row02['id'] . "' method='post' action='rt.php' enctype='multipart/form-data'>

                                <input type='submit' name='" . $row02['id'] . "' class='" . $clases2 . "' value='". $row02['rt'] ." RTS'></input>

                                </form>

                                </div>

                                <div id='mg'>

                                <form id='" . $row02['id'] . "' name='adasda' method='post' action='mg.php' enctype='multipart/form-data'>

                                <input type='submit' class='" . $clases . "' value='". $row02['mg'] . " MG'></input>

                                </form>

                                </div>

                                

                                
                                
                                </li>
                                
                                </div>";





                        }




                        ?>



                        </div>
                        <div id="lateralDOS" class="col-lg col-1 lateral">



                                



                        </div>
                </div>
        </div>
    
</body>
</html>