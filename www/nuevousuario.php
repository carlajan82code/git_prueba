<?php
session_start();
require_once("database.php");
$con = conectar();
crear_usuario($con, $_POST["nombre"], $_POST["pass"], $_POST["tipo"]);
cerrar_conexion($con);
header("Location: admin_page.php");
?>