<?php
session_start();
require_once("../database.php");


$login = $_POST['login'];
$mail = $_POST['mail'];
$contrasena = $_POST['contrasena'];
//1ºComprobamos que haya pulsado el Boton [Login]
if (isset($login)) {
	//Comprobamos por seguridad isset/empty de email / pass
	if (isset($mail) && !empty($mail) && isset($contrasena) && !empty ($contrasena))
	{
		$con = conectar();
		//Accedemos Base de Datos para comprobar
		$usuario = login($con, $mail, $contrasena);

		if (isset($usuario))
		{
			$_SESSION['id_usuario'] = $usuario['id_usuario'];
			$_SESSION['nombre'] = $usuario['nombre'];
			$_SESSION['tipo'] = $usuario['tipo'];

			if($_SESSION['tipo'] === 0){
				//$_SESSION['accesAdmin'] === true;
		
				header("Location: ../admin_page.php");
			}
			else{
			
				header("Location: ../user_page.php");
			}	

		}

	}
}
