<?php
//crear variables conectarme BD
$server = 'localhost';
$username = 'root';
$password = '';
$database = 'registrobijao';

//Validación para conectar con la BD
try{
    $conexion = new PDO("mysql:host=$server;dbname=$database;",$username,$password);
}catch (PDOException $error){
    die('Conexion fallida:'.$error->getMessage());
}
?>