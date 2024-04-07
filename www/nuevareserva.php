<?php
session_start();
require_once("database.php");
$con = conectar();
$result = crear_reserva($con, $_SESSION['logged_user'], $_POST["pista"], $_POST["turno"]);
if($result == false){
	$_SESSION["pista_ocupada"] = "La pista seleccionada está ocupada en este turno.";
}
cerrar_conexion($con);
header("Location: user_page.php");
?>