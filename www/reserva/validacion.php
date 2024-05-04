<?php
session_start();

if(!isset($_SESSION['id_usuario'])) {
    echo "No estás logueado.";
    die;
}

if(!isset($_SESSION['paqueteId'])) {
    echo "No se ha seleccionado ningún paquete.";
    die;
}

if(!isset($_POST['fecha']) || $_POST['fecha'] === "") {
    echo "No se ha seleccionado ninguna fecha.";
    die;
}

require_once("../database.php");
$con = conectar();
$result = crear_reserva($con, $_SESSION['id_usuario'], $_POST["fecha"], $_SESSION['paqueteId']);
if($result == false){
	echo "Las fechas seleccionadas ya están ocupadas, por favor selecciona otras.";
    cerrar_conexion($con);
    die;
}
cerrar_conexion($con);
header("Location: ../user_page.php");