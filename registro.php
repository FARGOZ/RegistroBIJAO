<?php

require 'database.php';

$mensaje = "";

//Proceso ingreso de informacion
if(!empty($_POST['email']) && !empty($_POST['password'])){
    $sql = "INSERT INTO usuarios (email, password) VALUES (:email, :password)";
    $stmt = $conexion->prepare($sql);
    $stmt->bindParam(':email', $_POST['email']);
    $password = password_hash($_POST['password'],PASSWORD_BCRYPT);
    $stmt->bindParam(':password', $password);

    //validamos que la información si se haya guardado
    if($stmt->execute()){
        $mensaje = 'Ha sido creado satisfactoriamente su usuario';
    }else{
        $mensaje = 'Lo sentimos su usuario no ha sido registrado';
    }
}


?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="assets/estilo.css">
</head>
<body>
    <?php require 'partials/header.php'?>
    
    <h1>Registro</h1>
    <form action="registro.php" method="post">
        <input class="input" type="text" name="email" placeholder="Ingresa tu Correo">
        <input class="input" type="password" name="password" placeholder="Ingresa tu contraseña">
        <input class="boton"  type="submit" value="Guardar">
    </form>
    
</body>
</html>