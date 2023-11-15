<?php

@include 'config.php';

if (isset($_POST['submit'])) {

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = ($_POST['password']);
   $cpass = ($_POST['cpassword']);

   $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if (mysqli_num_rows($result) > 0) {

      $error[] = 'Este usuario ya existe';
   } else {

      if ($pass != $cpass) {
         $error[] = 'La contraseña no coincide';
      } else {
         $insert = "INSERT INTO user_form(name, email, password) VALUES('$name','$email','$pass')";
         mysqli_query($conn, $insert);
         header('location:login_form.php');
      }
   }
};


?>

<!DOCTYPE html>
<html lang="es">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Registro</title>

   <link rel="stylesheet" href="style.css">

</head>

<body>

   <div class="form-container">

      <form action="" method="post">
         <h3>Registro</h3>
         <?php
         if (isset($error)) {
            foreach ($error as $error) {
               echo '<span class="error-msg">' . $error . '</span>';
            };
         };
         ?>
         <input type="text" name="name" required placeholder="Ingrese su nombre">
         <input type="email" name="email" required placeholder="Ingrese su correo">
         <input type="password" name="password" required placeholder="Ingrese su contraseña">
         <input type="password" name="cpassword" required placeholder="Confirme su contraseña">
         <input type="submit" name="submit" value="Regístrese" class="form-btn">
         <p>¿Ya tiene una cuenta? <a href="login_form.php">Ingrese</a></p>
      </form>

   </div>

</body>

</html>