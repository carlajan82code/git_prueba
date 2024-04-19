<?php
session_start();
require_once ("../database.php");

$registro = $_POST['registro'];
$mail = $_POST['mail'];
$nombre = $_POST['nombre'];
$contrasena = $_POST['contrasena'];
$conf_contrasena = $_POST['conf_contrasena'];

if(!isset($registro) || !isset($mail) || !isset($contrasena) || !isset($conf_contrasena) || !isset($nombre)){
	echo "Campos incompletos";
	die;
}

if (!validaEmail($mail) || !validaContrasena($contrasena)){
	echo "Los campos introducidos no son validos.";
	die;
}

if ($contrasena !== $conf_contrasena) {
    echo "Las contraseñas no coinciden";
	die;
}

$con = conectar();
$resultado = crear_usuario($con, $nombre, $contrasena, 1);

if (!$resultado) {
    echo "No se pudo crear el usuario";
}

function validaEmail($mail){
	$emailRegex = '/^[^\s@]+@[^\s@]+\.[^\s@]+$/';
	return preg_match($emailRegex, $mail);
}

function validaContrasena($contrasena){
	$contrasenaRegex = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/';
	return preg_match($contrasenaRegex, $contrasena);
}