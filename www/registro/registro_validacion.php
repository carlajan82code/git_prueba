<?php
require_once ("../database.php");

$registro = $_POST['registro'];
$email = $_POST['email'];
$nombre = $_POST['nombre'];
$contrasena = $_POST['contrasena'];
$conf_contrasena = $_POST['conf_contrasena'];

if(!isset($registro) || !isset($email) || !isset($contrasena) || !isset($conf_contrasena) || !isset($nombre)){
	echo "Campos incompletos";
	die;
}

if (!validaEmail($email) || !validaContrasena($contrasena)){
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

function validaEmail($email){
	$emailRegex = '/^[^\s@]+@[^\s@]+\.[^\s@]+$/';
	return preg_match($emailRegex, $email);
}

function validaContrasena($contrasena){
	$contrasenaRegex = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/';
	return preg_match($contrasenaRegex, $contrasena);
}