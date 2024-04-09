<?php
require_once ("../database.php");

$login = $_POST['login'];
$email = $_POST['email'];
$contrasena = $_POST['contrasena'];
if(!isset($login) || !isset($email) || !isset($contrasena)){
	echo "Las credenciales introducidas no son correctas.";
	die;
}

if (!validaEmail($email) || !validaContrasena($contrasena)){
	echo "Las credenciales introducidas no son correctas.";
	die;
}

$con = conectar();
$usuario = login($con, $email, $contrasena);
if(empty($usuario)){
	echo "Las credenciales introducidas no son correctas.";
	die;
}

session_start();
$_SESSION['logged_user'] = $usuario['id_usuario'];
$_SESSION['logged_user_name'] = $usuario['nombre'];
$_SESSION['logged_user_type'] = $usuario['tipo'];
if($usuario['tipo'] == 0){
	header("Location: admin_page.php");
	die;
}
header("Location: user_page.php");

function validaEmail($email){
	$emailRegex = '/^[^\s@]+@[^\s@]+\.[^\s@]+$/';
	return preg_match($emailRegex, $email);
}

function validaContrasena($contrasena){
	$contrasenaRegex = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/';
	return preg_match($contrasenaRegex, $contrasena);
}