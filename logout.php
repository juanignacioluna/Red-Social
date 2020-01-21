<?php
 session_start();
 $username = $_SESSION['username']; 
 unset($_SESSION['username']); 
 session_destroy();  
?>
<html>
  <head>   
    <title>Logout</title>
   </head>
<body>
    <center>
       <h4>Has cerrado la sesion.<h4>
       <h4><a href="index.php">Haz click para el Login<a></h4>
    </center>
</body>
</html>