<?php

session_start();

if(isset($_SESSION['username']))
{

        $logout = '<a href="logout.php"><button style="margin-top: 10%; margin-left: 0%;" type="button" class="btn btn-danger">LOGOUT</button></a>';

}
else
{
        header("location:index.php");
}

$user25 = $_SESSION['username'];







?>

<!DOCTYPE html>
<html lang="en">
        <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
                <li class="nav-item">
                        <a class="nav-link" href="timeline.php">Inicio</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#" >Notificaciones</a>
                </li>
                <li class="nav-item">
                        <a class="nav-link" href="mensajes.php">Mensajes</a>
                </li>
                <li class="nav-item">
                        <a class="nav-link" href="perfil.php">Perfil</a>
                </li>

                </ul>

                <form class="form-inline my-2 my-lg-0" action='tuitear2.php' method='post' enctype='multipart/form-data'>

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

                        <h1 style="color:white;">NOTIFICACIONES: </h1>

                        <ul class="list-group">




                    <?php




                        include('config.php');


                        $yo=$_SESSION['username'];  
                                                                                
                        $sql8 = "select * from notis where (receptor='".$yo."' and emisor <> '".$yo."') order by id desc";
                        $result = mysqli_query($con,$sql8);


                    if (mysqli_num_rows($result) > 0){


                        

                        while($row02 = mysqli_fetch_array($result)){


                            $a=$row02['emisor'];

                            $sql89 = "select imagen from personal where usuario='".$a."'";
                            $result89 = mysqli_query($con,$sql89);

                            $row89 = mysqli_fetch_array($result89);

                            $img = $row89[0];
                            

                            if($row02['seguidorNuevo']==1){

                                $class="list-group-item list-group-item-primary";

                                $arroba="$a";

                                $yo=$_SESSION['username'];  


                                $mensaje="te ha seguido!!";

                                $mensajeDOS="";

                            }

                            if($row02['likeAtuit']==1){

                                $class="list-group-item list-group-item-danger";

                                $arroba="$a";


                                $mensaje="ha likeado tu tuit: ";

                                $id89=$row02['idTuit'];

                                $sql8999 = "select tuit from tuits where id='".$id89."'";
                                $result8999 = mysqli_query($con,$sql8999);
    
                                $row8999 = mysqli_fetch_array($result8999);
    
                                $tuitTT = $row8999[0];

                                $mensajeDOS="<br></br>

                                <div style='color:black;'>$tuitTT</div>";
                                
                            }

                            if($row02['likeART']==1){

                                $class="list-group-item list-group-item-danger";

                                $arroba="$a";


                                $mensaje="ha likeado tu Retuit: ";

                                $id89=$row02['idTuit'];

                                $sql8999 = "select tuit, usuario from tuits where id='".$id89."'";
                                $result8999 = mysqli_query($con,$sql8999);
    
                                $row8999 = mysqli_fetch_array($result8999);
    
                                $tuitTT = $row8999['tuit'];

                                $usuarioTT = $row8999['usuario'];

                                $mensajeDOS="<br></br>

                                <div style='color:black;'>@$usuarioTT: $tuitTT</div>";
                                
                            }

                            if($row02['rtAtuit']==1){

                                $class="list-group-item list-group-item-success";

                                $arroba="$a";


                                $mensaje="ha retuiteado tu tuit: ";

                                $id89=$row02['idTuit'];

                                $sql8999 = "select tuit from tuits where id='".$id89."'";
                                $result8999 = mysqli_query($con,$sql8999);
    
                                $row8999 = mysqli_fetch_array($result8999);
    
                                $tuitTT = $row8999[0];

                                $mensajeDOS="<br></br>

                                <div style='color:black;'>$tuitTT</div>";
                                
                            }

                            if($row02['rtART']==1){

                                $class="list-group-item list-group-item-success";

                                $arroba="$a";


                                $mensaje="ha retuiteado tu Retuit: ";

                                $id89=$row02['idTuit'];

                                $sql8999 = "select tuit, usuario from tuits where id='".$id89."'";
                                $result8999 = mysqli_query($con,$sql8999);
    
                                $row8999 = mysqli_fetch_array($result8999);
    
                                $tuitTT = $row8999['tuit'];

                                $usuarioTT = $row8999['usuario'];

                                $mensajeDOS="<br></br>

                                <div style='color:black;'>@$usuarioTT: $tuitTT</div>";
                                
                            }



                            echo "<li class='" . $class. "'>
                            
                            <a href='user.php?u=" . $arroba . "'><img class='fox' src='" . $img . "' alt='fox'></img></a>
                        
                            <div>@" . $arroba. " " . $mensaje. " </div>

                            " . $mensajeDOS. "
                        
                        
                </li>";



                        }


                    }
















                    ?>



                        </ul>




                        </div>
                        <div id="lateralDOS" class="col-lg col-1 lateral">


                

                        </div>
                </div>
        </div>
    
</body>
</html>