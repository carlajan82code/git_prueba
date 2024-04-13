<?php
session_start();
require_once ("../database.php");

<<<<<<< HEAD

$login = $_POST['login'];
$email = $_POST['email'];
$contrasena = $_POST['contrasena'];
//1ºComprobamos que haya pulsado el Boton [Login]
if(isset($login)){
	//Comprobamos por seguridad isset/empty de email / pass
	if (isset($email) && !empty($email) && isset($contrasena) && !empty ($contrasena))
	{
		//Si son correctos vamos a verificar si son validos
		if (validaEmail($email) && validaContrasena($contrasena)){

			$con = conectar();
			//Accedemos Base de Datos para comprobar
			$usuario = login($con, $email, $contrasena);

			
			if ($usuario === true)
			{
				$_SESSION['logged_user'] = $usuario['id_usuario'];
				$_SESSION['logged_user_name'] = $usuario['nombre'];
				$_SESSION['logged_user_type'] = $usuario['tipo'];

				if($usuario['tipo'] === 0){
					header("Location: admin_page.php");
				}
				else{
					header("Location: user_page.php");
				}	

			}

						
=======
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
>>>>>>> main
		}

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

function validaEmail($email){
	$emailRegex = '/^[^\s@]+@[^\s@]+\.[^\s@]+$/';
	return preg_match($emailRegex, $email);
}

function validaContrasena($contrasena){
	$contrasenaRegex = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/';
	return preg_match($contrasenaRegex, $contrasena);
}