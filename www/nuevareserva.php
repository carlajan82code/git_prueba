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
<div id="nueva-reserva-contenedor">
	<div id="nueva-reserva-formulario">
		<title>Reservas</title>
		<h1>Selecciona la fecha para tu paquete</h1>
		<input id="paqueteId" type="hidden" value="<?=$_POST["paqueteId"]?>">
		<form class="formReserva" method="post" action="reserva/validacion.php">
			<label for="fecha">Fecha:</label>
			<input type="date" id="fecha" name="fecha" min="<?=date("Y-m-d"); ?>"><br>
			<label id="error" class="error"></label>
			<br><br>
			<button class="texto-entrada--boton" type="submit" onclick="return validarReserva()">Reserva</button>
		</form>
	</div>
</div>
<script src='javaScript/validacion.js'></script>
<script src='javaScript/nuevaReserva.js'></script>
<?php require_once("vistas/footer.php"); ?>
</body>
</html>

