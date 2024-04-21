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

<header class="header">
    <nav class="navegacion">
    	<div class="navegacion_contenido">
        	<a href="./index.php"><img src="img/Seyfert.png" alt="logo Seyfert" width="150px"></a>

			<div class="enlaces-nav">
            	<a class="navegacion_contenido--enlace" href="./registro.php">Registrarse</a>
            	<a class="navegacion_contenido--enlace" href="./login.php">Log-in</a>
				<a class="navegacion_contenido--enlace" href="./galeria.php">Galeria</a>		
			</div>
            <!-- <a class="nav-link" href="../index.php?log-out">Log-out</a> -->

			<div class="enlaces-nav__boton" >
			<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-ufo" width="42" height="42" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
  				<path stroke="none" d="M0 0h24v24H0z" fill="none"/>
  				<path d="M16.95 9.01c3.02 .739 5.05 2.123 5.05 3.714c0 2.367 -4.48 4.276 -10 4.276s-10 -1.909 -10 -4.276c0 -1.59 2.04 -2.985 5.07 -3.724" />
  				<path d="M7 9c0 1.105 2.239 2 5 2s5 -.895 5 -2v-.035c0 -2.742 -2.239 -4.965 -5 -4.965s-5 2.223 -5 4.965v.035" />
  				<path d="M15 17l2 3" />
  				<path d="M8.5 17l-1.5 3" />
				<path d="M12 14h.01" />
				<path d="M7 13h.01" />
				<path d="M17 13h.01" />
			</svg>
				<a class="navegacion_contenido--boton" href="./blog.php">blog</a>

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