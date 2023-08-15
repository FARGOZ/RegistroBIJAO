<?php

//validamos registro
if(!empty($_POST['email']) && !empty($_POST['password'])){
    $consulta = $conexion->prepare('SELECT id, email, password FROM usuarios WHERE email=:email');
    $consulta->bindParam(':email', $_POST['email']);
    $consulta->execute();
    $resutado = $consulta->fetch(PDO::FETCH_ASSOC);
}


?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="assets/estilo.css">
</head>
<body>
    <?php require 'partials/header.php'?>
    
    <h1>Login</h1>
    <form action="login.php" method="post">
        <input class="input" type="text" name="email" placeholder="Ingresa tu Correo">
        <input class="input" type="password" name="password" placeholder="Ingresa tu contraseña">
        <input class="boton"  type="submit" value="Enviar">
    </form>
    
</body>
</html>