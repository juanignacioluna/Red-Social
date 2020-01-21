<?php


session_start(); 
 if(isset($_SESSION['username'])) 
{ echo "
   <script>alert('ya estas logueado!');
     alert('Cerra sesion para loguearte primero.');
      window.location='timeline.php';
   </script>";
 }

if($_SERVER["REQUEST_METHOD"] == "POST")
 { 
   $username=$_POST['username'];  
   $password=$_POST['password']; 
   include('config.php'); 
                           
   $sql_query = "select count(*) as cntUser from usuarios where usuario='".$username."' and clave='".$password."'";
   $result = mysqli_query($con,$sql_query);
   $row = mysqli_fetch_array($result);
   $count = $row['cntUser'];
 
 
  if($count > 0){ 
  $_SESSION['username'] = $username;
  echo "<script>
  alert('Bieeeeen...'); 
  function redi(){window.location='timeline.php';}
  var msg='Espere que lo estamos redirijiendo a la pagina principal...'; 
  document.write('<font color=blue>'+'Espere que lo estamos redirijiendo a la pagina principal...'+'</font>');
  setTimeout('redi()',3000);
         </script>";     
          }
 else{
     echo "
      <script>alert('Datos invalidos...'); 
      </script>"; 
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
                        <input name="username" placeholder="Usuario" class="form-control form-control-lg" type="text" placeholder=".form-control-lg">
                        <br></br>
                        <input name="password" placeholder="Password" class="form-control form-control-lg" type="password" placeholder=".form-control-lg">
                        <br></br>
                        <input type="submit" value="Iniciar Sesion" class="btn btn-dark btn-lg ini"></input>
                        <br></br>
                        </form>

                        <a href="registro.php"><button type="button" class="btn btn-info reg">Registrarse</button></a>
                        




                  </div>


                  <div class="col-sm"></div>
                </div>
        </div>
    
</body>
</html>