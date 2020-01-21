<?php


session_start(); 
 if(isset($_SESSION['username'])) 
{ echo "
   <script>
     alert('Cerra sesion primero!');
      window.location='timeline.php';
   </script>";
 }

if($_SERVER["REQUEST_METHOD"] == "POST")
 { 
   $username=$_POST['username'];  
   $password=$_POST['password'];
   $name=$_POST['name'];  
   $bio=$_POST['bio'];
   
   



   include('config.php'); 
                           
   $sql_query = "select * from usuarios where usuario='".$username."'";
   $result = mysqli_query($con,$sql_query);
   $row = mysqli_fetch_array($result);

   $row_cnt = mysqli_num_rows($result);
   mysqli_free_result($result);
   
 
 
  if($row_cnt > 0){ 
                  echo "<script>alert('El arroba ya esta siendo utilizado!'); 
                  </script>";   
          }else{

                  include('config.php');

                  $sql5 = "insert into personal (usuario, clave, nombreCompleto, biografia, seguidores, siguiendo, imagen) values ('$username', '$password', '$name', '$bio', 0, 0, 'fotos/twitter.png')";
                  
                  if (mysqli_query($con, $sql5)) {
                }

                  $sql6 = "insert into usuarios (usuario, clave) values ('$username', '$password')";
                  

                  if (mysqli_query($con, $sql6)) {
                }

                echo "<script>
                      alert('Bieeeeen...'); 
                      function redi(){window.location='timeline.php';}
                      var msg='Espere que lo estamos redirijiendo a la pagina principal...'; 
                      document.write('<font color=blue>'+'Espere que lo estamos redirijiendo a la pagina principal...'+'</font>');
                      setTimeout('redi()',3000);
                      </script>"; 


                $_SESSION['username'] = $username;

                 
                  




                }
 }



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
    <link rel="stylesheet" href="sa.css">
    <title>SocialNET</title>
</head>
<body>


        <div class="container-fluid">
                <div class="row">
                  <div class="col-sm"></div>


                  <div class="col-sm">
                    


                        <form method="post"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                            <img class="tw" src="fotos/twitter.png" alt="logo"></img>
                            <br></br>
                            <input name="username" placeholder="Arroba" class="form-control" type="text" placeholder=".form-control-lg">
                            <br></br>
                            <input name="password" placeholder="Password" class="form-control" type="password" placeholder=".form-control-lg">
                            <br></br>
                            <input name="name" placeholder="Nombre Completo" class="form-control" type="text" placeholder=".form-control-lg">
                            <br></br>
                            <input name="bio" placeholder="Biografia del perfil" class="form-control" type="text" placeholder=".form-control-lg">
                            <br></br>
                            <input type="submit" value="Registrarse" class="btn btn-dark btn-lg ini2"></input>
                            <br></br>
                        </form>

                        <a href="index.php"><button type="button" class="btn btn-info btn-lg reg2">Iniciar Sesion</button></a>
                        




                  </div>


                  <div class="col-sm"></div>
                </div>
        </div>
    
</body>
</html>