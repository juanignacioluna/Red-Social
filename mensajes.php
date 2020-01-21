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

$yo = $_SESSION['username'];




require('config.php');


if(isset($_GET['m'])){

    $m=$_GET['m'];

    $sql99 = "SELECT * from chats where (usuario1 = '$yo' and usuario2='$m') or (usuario2 = '$yo' and usuario1='$m')";
    $result99 = mysqli_query($con, $sql99);

    if (mysqli_num_rows($result99) > 0){


    }else{


        $sql12345 = "insert into chats (usuario1, usuario2) values ('$yo', '$m')";
    
        if (mysqli_query($con, $sql12345)) {}



    }




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
                <link type="text/css" rel="stylesheet" href="mensajes.css">
                <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
                <title>SocialNET</title>
            </head>
<body>

        <script type="text/javascript">

            $(document).ready(function(){
            
                    var height = $(window).height();
            
                    $('#lateralUNO').height(height);

                    $('#lateralDOS').height(height);






                    $(".chat_people form").submit(function(e) {


                        var formObj = $(this);
                        var formURL = formObj.attr("action");
                        var formData = new FormData(this);

                        var idChat = formObj.attr("id");


                        $.ajax({
                        url: formURL,
                        type: 'POST',
                        data: {idChat : idChat},
                        mimeType:"multipart/form-data",
                        success: function(data)
                        {

                                $("#chats").remove();

                                

                                $(".msg_history").append(data);

                                $('.msg_history').scrollTop($('.msg_history')[0].scrollHeight);




                        }         
                        });
                        e.preventDefault(); 



                        });



                        $("#enviar").submit(function(e) {


                                
                                var formObj = $(this);
                                var formURL = formObj.attr("action");
                                var formData = new FormData(this);

                                var idChat = $('#chats').attr("name");

                                var mensaje = $('#mensajeInput').val();


                                $.ajax({
                                url: formURL,
                                type: 'POST',
                                data: {idChat : idChat, mensaje: mensaje},
                                mimeType:"multipart/form-data",
                                success: function(data)
                                {

                                    $("#chats").append(data);

                                    $('#mensajeInput').val('');

                                    $('.msg_history').scrollTop($('.msg_history')[0].scrollHeight);


                                    

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
                <li class="nav-item">
                        <a class="nav-link" href="timeline.php">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="notis.php" >Notificaciones</a>
                </li>
                <li class="nav-item active">
                        <a class="nav-link" href="#">Mensajes</a>
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
                        <div id="centro" class="col-sm centro">


                        <div style='background-color: white;' class="messaging">
                            <div class="inbox_msg">
                                <div class="inbox_people">
                                <div class="inbox_chat scroll">




                                    <?php


                                        include('config.php');


                                        $sql8 = "select * from chats where (usuario1='".$yo."' or usuario2='".$yo."') order by id desc";
                                        $result = mysqli_query($con,$sql8);



                                        if (mysqli_num_rows($result) > 0){


                                            while($row02 = mysqli_fetch_array($result)){



                                                if(!strcasecmp($row02['usuario1'], $yo)){

                                                    $arroba2=$row02['usuario2'];


                                                }else{

                                                    $arroba2=$row02['usuario1'];


                                                }


                                                $sql_query = "select * from personal where usuario='".$arroba2."'";
                                                $result2 = mysqli_query($con,$sql_query);
                                                $row = mysqli_fetch_array($result2);
        
                                                $nombre2 = $row['nombreCompleto'];

                                                $imagen2 = $row['imagen'];





                                                echo "
                                                
                                                
        

                



                                                <div id='chatear'>
                                                
                                                <div class='chat_list active_chat'>
                                                <div class='chat_people'>
                                                    <h5>" . $nombre2 . "</h5>
                                                    <h6>@" . $arroba2 . "</h6>
                                                    
                                                    <form id='" . $row02['id'] . "' method='post' action='mensajes2.php' enctype='multipart/form-data'>
                
                                                    <button type='submit' class='btn btn-info' ><i class='fas fa-envelope'></i></button>
                    
                                                    </form>
                                                    

                                                </div>
                                                </div>
                                                
                                                </div>";









                                            }


                                        }








                                    ?>








                                </div>
                                </div>





                                <div class="mesgs">
                                <div class="msg_history">










                                <div id="chats"></div>












                                </div>


                                <div class="type_msg">
                                    <div class="input_msg_write">

                                    <form id='enviar' method='post' action='mensajes3.php' enctype='multipart/form-data'>

                                        <input id="mensajeInput" name="mensaje" type="text" class="write_msg" placeholder="Escribe un mensaje..." />
                    
                                        <button type='submit' class='msg_send_btn btn btn-primary' ><i class='fa fa-paper-plane'></i></button>

                                    </form>
                                    </div>
                                </div>



                                
                                </div>
                            </div>
                            </div>






                        </div>
                </div>
        </div>
    
</body>
</html>