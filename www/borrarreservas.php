<?php
session_start();
require_once("database.php");
if($_SESSION['accesAdmin']===false){
    header("Location: login.php");
}
$con = conectar();
$codigos = $_POST['borrar'];
borrar_reservas($con, $codigos);
cerrar_conexion($con);
header('Location: admin_page.php');
?>
