<?php
session_start();
require_once ("database.php");

$nombre = $_POST["nombre"];
$email = $_POST["mail"];
$contrasena = $_POST["contrasena"];
$conf_contrasena = $_POST["conf_contrasena"];

if(isset($_POST["registro"]))
{

    if (isset($nombre) && !empty($nombre) && isset($email) && !empty ($email) && isset($contrasena) && !empty ($contrasena) && isset($conf_contrasena) && !empty ($conf_contrasena))
	{
        if (validaEmail($email) && validaContrasena($contrasena))
        {
            if ($contrasena === $conf_contrasena){
                $con = conectar();
			    //Accedemos Base de Datos para comprobar
			    $usuario = login($con, $email, $contrasena);

                if ($usuario === false)
                {
                    //Query Insert Into con los datos introducidos....
                }



            }
    }

    }




}











