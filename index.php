<?php

@include 'config.php';

session_start();

if (!isset($_SESSION['user_name'])) {
   header('location:login_form.php');
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Página De Usuario</title>

   <link rel="stylesheet" href="style.css">

</head>

<body>

   <div class="container">

      <div class="content">
         <h3>Hola,</h3>
         <h1>Bienvenido/a <span><?php echo $_SESSION['user_name'] ?></span></h1>
         <br>
         <a href="logout.php" class="btn">Salir</a>

</body>

</html>