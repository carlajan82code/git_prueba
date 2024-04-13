<?php
session_start();
require_once ("../database.php");


$login = $_POST['login'];
$mail = $_POST['mail'];
$contrasena = $_POST['contrasena'];
//1ºComprobamos que haya pulsado el Boton [Login]
if(isset($login)){
	//Comprobamos por seguridad isset/empty de email / pass
	if (isset($mail) && !empty($mail) && isset($contrasena) && !empty ($contrasena))
	{
		//Si son correctos vamos a verificar si son validos
		//if (validaEmail($mail) && validaContrasena($contrasena)){

			$con = conectar();
			//Accedemos Base de Datos para comprobar
			$usuario = login($con, $mail, $contrasena);

			if (isset($usuario))
			{
				$_SESSION['id_usuario'] = $usuario['id_usuario'];
				$_SESSION['nombre'] = $usuario['nombre'];
				$_SESSION['tipo'] = $usuario['tipo'];

				if($_SESSION['tipo'] === 0){
					header("Location: ../admin_page.php");
				}
				else{
					header("Location: ../user_page.php");
				}	

			}

						
		//}

	}
}




// $_SESSION['logged_user'] = $usuario['id_usuario'];
// $_SESSION['logged_user_name'] = $usuario['nombre'];
// $_SESSION['logged_user_type'] = $usuario['tipo'];
// if($usuario['tipo'] == 0){
// 	header("Location: admin_page.php");
// 	die;
// }
// header("Location: user_page.php");

function validaEmail($mail){
	$emailRegex = '/^[^\s@]+@[^\s@]+\.[^\s@]+$/';
	return preg_match($emailRegex, $mail);
}

function validaContrasena($contrasena){
	$contrasenaRegex = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/';
	return preg_match($contrasenaRegex, $contrasena);
}