<?php
session_start();
// require_once ("../database.php");

$nombreUsuario = $_POST['nombre'];
// $mail = $_POST['mail'];
// $nombre = $_POST['nombre'];
// $contrasena = $_POST['contrasena'];
// $conf_contrasena = $_POST['conf_contrasena'];

if(isset($nombreUsuario)){
    echo "Campos incompletos";
	die;
}


