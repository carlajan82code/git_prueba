<?php
session_start();
include_once("./vistas/header.php");
require_once("database.php");
$con = conectar();

// //GESTIÓN USUARIOS
require_once("gestion_usuarios.php");

// //GESTION RESERVAS
require_once("gestion_reservas.php");
include_once("./vistas/footer.php");
?>