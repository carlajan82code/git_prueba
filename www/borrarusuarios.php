<?php
session_start();
require_once("database.php");
$con = conectar();
$codigos = $_POST['borrar'];
borrar_usuarios($con, $codigos);
cerrar_conexion($con);
header('Location: admin_page.php');
?>