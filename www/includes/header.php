<?php
session_start();
if(!isset($_SESSION['logged_user'])){
	header("Location: index.php");
	exit();
}
echo "<h1>Welcome ".$_SESSION['logged_user_name']."</h1>";
echo "<form method='post' action='logout.php'><input type='submit' value='Logout'/></form>";

if(str_contains($_SERVER['PHP_SELF'], "admin_page.php") || str_contains($_SERVER['PHP_SELF'], "nuevapista.php") || str_contains($_SERVER['PHP_SELF'], "modificarpista.php") || str_contains($_SERVER['PHP_SELF'], "borrarpistas.php") || str_contains($_SERVER['PHP_SELF'], "borrarreservas.php") || str_contains($_SERVER['PHP_SELF'], "nuevousuario.php") || str_contains($_SERVER['PHP_SELF'], "modificarusuario.php") || str_contains($_SERVER['PHP_SELF'], "borrarusuarios.php")){
	if($_SESSION['logged_user_type'] != 0){
		echo "No puedes acceder a esta página";
		exit();
	}
}
if(str_contains($_SERVER['PHP_SELF'], "user_page.php") || str_contains($_SERVER['PHP_SELF'], "nuevareserva.php") || str_contains($_SERVER['PHP_SELF'], "borrarreservas.php")){
	if($_SESSION['logged_user_type'] != 1){
		echo "No puedes acceder a esta página";
		exit();
	}
}
?>