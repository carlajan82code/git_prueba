<?php
require_once ("../database.php");

if(isset($_POST['login'])){
	$usuario = login($con, $_POST['username'], $_POST['password']);
	if(empty($usuario)){
		echo "Las credenciales introducidas no son correctas.";
	}
	else{
		$_SESSION['logged_user'] = $usuario['id_usuario'];
		$_SESSION['logged_user_name'] = $usuario['nombre'];
		$_SESSION['logged_user_type'] = $usuario['tipo'];
		if($usuario['tipo'] == 0){
			header("Location: admin_page.php");
		}
		else{
			header("Location: user_page.php");	
		}
	}
}
?>