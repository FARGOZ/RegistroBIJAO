<?php
session_start();

if(isset($_SESSION['user_id'])){
    header('Location: /RegistroBIJAO');
}

require 'database.php'; 

$resultados = [];

//validamos registro
if(!empty($_POST['email']) && !empty($_POST['password'])){
    $consulta = $conexion->prepare('SELECT id, email, password FROM usuarios WHERE email=:email');
    $consulta->bindParam(':email', $_POST['email']);
    $consulta->execute();
    $resultados = $consulta->fetch(PDO::FETCH_ASSOC);
}

$mensaje = "";

    //validar el ingreso del usuario
    if(count($resultados) > 0 && password_verify($_POST['password'], $resultados['password'])){
        $_SESSION['user_id'] = $resultados['id'];
        header('Location: /RegistroBIJAO');
        exit();
    }else{
        $mensaje = 'Lo sentimos sus credenciales no son correctas';
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

    <?php if(!empty($mensaje)): ?>
      <p> <?= $mensaje ?></p>
    <?php endif; ?>

    <h1>Login</h1>
    <form action="login.php" method="post">
        <input class="input" type="text" name="email" placeholder="Ingresa tu Correo">
        <input class="input" type="password" name="password" placeholder="Ingresa tu contraseña">
        <input class="boton"  type="submit" value="Enviar">
    </form>
    
</body>
</html>