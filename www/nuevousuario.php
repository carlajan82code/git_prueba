<?php
session_start();
require_once("database.php");
if($_SESSION['accesAdmin']===false){
    header("Location: login.php");
}
$con = conectar();
crear_usuario($con, $_POST["nombre"], $_POST["mail"], $_POST["contrasena"], $_POST["tipo"]);
cerrar_conexion($con);
header("Location: admin_page.php");
?>