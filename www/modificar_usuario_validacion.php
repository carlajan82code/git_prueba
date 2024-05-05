<?php
require_once("database.php");
$con = conectar();

$id_usuario = $_POST['id_usuario'];
$nombre = $_POST['nombre'];
$contrasena = $_POST['contrasena'];
$tipo = $_POST['tipo']; 

if(isset($nombre) && !empty($nombre) && isset($contrasena) && !empty($pass)){

    modificar_usuario($con, $id_usuario, $nombre, $pass, $tipo);
    header('Location: admin_page.php');
}

?>