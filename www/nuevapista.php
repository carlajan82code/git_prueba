<?php
session_start();
require_once("database.php");
$con = conectar();
crear_pista($con, $_POST["nombre"]);
cerrar_conexion($con);
header("Location: admin_page.php");
?>