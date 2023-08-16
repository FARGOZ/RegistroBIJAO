<?php 

session_start();

require 'database.php';

$resultados = [];

if (isset($_SESSION['user_id'])) {
    $consulta = $conexion->prepare('SELECT id, email, password FROM usuarios WHERE id = :id');
    $consulta->bindParam(':id', $_SESSION['user_id']);
    $consulta->execute();
    $resultados = $consulta->fetch(PDO::FETCH_ASSOC);

    $usuario = null;

    //validar el ingreso del usuario
    if(count($resultados) > 0){
        $usuario = $resultados;
    }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenidos a l a APP BIJAO</title>
    <link rel="stylesheet" href="assets/estilo.css">
</head>
<body>
    <?php require 'partials/header.php'?>
    <!--Pantalla 1 Entraron al sistema-->
    <?php if(!empty($usuario)): ?>
        <b>Bienvenido.</b>
        <b>Haz ingresado al aplicativo</b>
        <a href="logout.php">Cerrar sesión</a>
    <?php else: ?>
    <!--Pantalla 1 no han entrado al sistema-->
    <h1>Por favor ingresar o registrase</h1>

    <a href="login.php">Inicia Sesión</a> ó
    <a href="registro.php">Regístrate</a>

    <?php endif;?>

</body>
</html>

