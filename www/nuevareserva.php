<?php
session_start();
if ($_SESSION['accesUser']===false) {// ver con el grupo

    header("Location: login.php");
}
if (!isset($_POST["paqueteId"])) {
	header("Location:index.php");
	die;
}
$_SESSION['paqueteId'] = $_POST["paqueteId"];
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservar</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
<?php require_once ("vistas/header_login.php"); ?>
<main>
	<div id="nueva-reserva-contenedor">
		<div id="nueva-reserva-formulario">
			<h1 class='admin-title'>Selecciona la fecha para tu paquete</h1>
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
</main>
<script src='javaScript/validacion.js'></script>
<script src='javaScript/nuevaReserva.js'></script>
<?php require_once("vistas/footer.php"); ?>
</body>
</html>

