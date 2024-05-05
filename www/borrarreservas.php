<?php
session_start();
require_once("database.php");
$con = conectar();
if (isset($_POST['Borrar'])) {
	$codigos = $_POST['borrar'];
	borrar_reservas($con, $codigos);
} else {
	borrar_todas_reservas($con);
}
cerrar_conexion($con);
if ($_SESSION['logged_user_type'] == 0) {
	header('Location: admin_page.php');
} else {
	header('Location: user_page.php');
}
