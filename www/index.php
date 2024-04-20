<?php
session_start();
// require("database.php");
// $con = conectar();
?>

<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="styles/style.css">
	<title>Seyfert</title>
</head>

<body>

	<header>
		<nav class="navegacion">
			<div class="navegacion_contenido">
				<a href="./index.php"><img src="img/Seyfert.png" alt="logo Seyfert" width="150px"></a>

				<div class="enlaces-nav">
					<a class="navegacion_contenido--enlace" href="registro.php">Registrarse</a>
					<a class="navegacion_contenido--enlace" href="login.php">Log-in</a>
				</div>

			</div>
		</nav>
	</header>

	<div class="bg-luna">

	</div> <!-- Backgroung Imagen Luna -->

	<footer class="footer">


		<div class="footer_contenido">
			<div class=footer_cotenido-logo>

				<img src="./img/seyfertDark.png" alt="logo Seyfert Footer" width="150px">
			</div>
			<div class="footer_contenido-contacto">
				<h2>contacto</h2>
				<p> Madrid, España</p>
				<p> info@seyfert.com</p>
				<p> +34 603565839</p>
			</div>
              <!--  iconos RRSS -->
			  <div class="footer_redes">
				<img src="./img/instagram.svg" alt="red Instragram" href="">
				<img src="./img/twiter.svg" alt="red twiter" class="icono-twitter">
				<img src="./img/linkedin.svg" alt="red linkedin">
				<img src="./img/whatsapp.svg" alt="red whatsapp" class="icono-whatsapp">
	
			</div>

		</div>

		<!-- Incluir una Linea -->
		<span>

		</span>

		<div class="copi_footer">
			<p>Copyright @<?php echo date("Y"); ?> All rights reserved by: SEYFERT</p>
		</div>


	</footer>


</body>

</html>