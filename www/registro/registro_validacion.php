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
}else{
 
   echo "<!DOCTYPE html>
   <html lang='es'>
   <head>
	   <meta charset='UTF-8'>
	   <meta name='viewport' content='width=device-width, initial-scale=1.0'>
	   <title>Registro Exitoso</title>
	   <link rel='stylesheet' href='style.css'>
	
	   <link rel='stylesheet' href='estilos.css'>
   </head>
   <body>
	   <div class='container_bienvenida'>
		   <h1>¡Registro Exitoso!</h1>
		   <p>¡Felicidades ".ucfirst($nombre)." te has registrado correctamente!</p>
		   <p><a href='../login.php'>Inicia sesión</a> para comenzar a dar tus primeros pasos hacia la Luna.</p>
	   </div>
   </body>
   </html>";



}

function validaEmail($mail){
	$emailRegex = '/^[^\s@]+@[^\s@]+\.[^\s@]+$/';
	return preg_match($emailRegex, $mail);
}

function validaContrasena($contrasena){
	$contrasenaRegex = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/';
	return preg_match($contrasenaRegex, $contrasena);
}