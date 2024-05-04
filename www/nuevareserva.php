<?php 
if (!isset($_POST["paqueteId"])) {
	header("Location:index.php");
	die;
}
session_start();
if (isset($_SESSION["id_usuario"])) {
	require_once("vistas/header_login.php");
} else {
	require_once("vistas/header.php");
}
$_SESSION['paqueteId'] = $_POST["paqueteId"];
?>
<title>Reservas</title>
<h1>Selecciona la fecha para tu paquete</h1>
<form class="formReserva" method="post" action="reserva/validacion.php">
	<label for="fecha">Fecha:</label>
	<input type="date" id="fecha" name="fecha"><br>
	<label id="error" class="error"></label>
	<br><br>
	<button type="submit" onclick="return validarReserva()">Reserva</button>
</form>
<script src='javaScript/validacion.js'></script>
</body>
</html>