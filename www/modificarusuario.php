<?php
session_start();
require_once("database.php");
if($_SESSION['accesAdmin']===false){ /* Control de acceso*/ 
    header("Location: login.php");
}
$con = conectar();
$id_usuario = $_GET["id"];
$resultado = obtener_usuario($con, $id_usuario);
$num_filas = obtener_num_filas($resultado); ?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar usuario</title>
    <link rel="stylesheet" href="styles/style.css">
</head>

<body>
    <?php require_once("./vistas/header_login.php");?>
    <main>
		<?php if($num_filas == 0){
			header("Location: admin_page.php");
		}
		else{
			$datos_usuario = obtener_resultados($resultado);
			extract($datos_usuario);
			echo "<h1 class='admin-title'>Modificar usuario</h1>
			
				<div class='contenedor-tabla'><ul class='responsive-tabla'>
				<form method='post' action='/modificar_usuario_validacion.php' onsubmit='return validar_crearModificar_usuario();'>
				<li class='tabla-header'>
					<div class='col col-1'>NOMBRE</div>
					<div class='col col-2'>MAIL</div>
					<div class='col col-3'>PASSWORD</div>
					<div class='col col-4'>TIPO</div>
				</li>
				<li class='tabla-fila'>
					<input type='hidden' name='id_usuario' value='$id_usuario'>
					<div class='col col-1' data-label='NOMBRE' id='contenedor_nombre'><input type='text' name='nombre' value='$nombre'></div>
					<div class='col col-2' data-label='MAIL' id='contenedor_mail'><input type='email' name='mail'value='$mail'/></div>
					<div class='col col-3' data-label='PASSWORD' id='contenedor_contrasena'><input type='password' name='contrasena'></div>
					<div class='col col-4' data-label='TIPO'>
						<select name='tipo'>";
							if($tipo == 0){
								echo "<option value='0' selected>Admin</option>";
								echo "<option value='1'>User</option>";
							}
							else{
								echo "<option value='0'>Admin</option>";
								echo "<option value='1' selected>User</option>";
							}
						echo "</select>
					</div>
				</li>
				<li class='tabla-fila'>
					<div class='col col-unica' style='text-align:right; padding-right:40px;' data-label='MODIFICAR'><input type='submit' name='modificar' value='Modificar'/></div>
				</li>
				</form></ul></div>
				<script src='javaScript/validacion.js'></script>";
			
		}
		cerrar_conexion($con);?>
	</main>
  <?php require_once("./vistas/footer.php");?>
</body>
</html>

