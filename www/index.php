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

	

   <?php
 require_once ("./vistas/footer.php");
   ?>

	


</body>

</html>