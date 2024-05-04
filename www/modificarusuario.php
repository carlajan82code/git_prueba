<?php
session_start();
require_once("vistas/header.php");
require_once("database.php");
$con = conectar();
$id_usuario = $_GET["id"];
$resultado = obtener_usuario($con, $id_usuario);
$num_filas = obtener_num_filas($resultado);
if($num_filas == 0){
	header("Location: admin_page.php");
}
else{
	$datos_usuario = obtener_resultados($resultado);
	extract($datos_usuario);
	echo "<h1>Modificar usuario</h1>";
	echo "<div class='contenedor-tabla'><ul class='responsive-tabla'>
		<form method='post' action='/modificar_usuario_validacion.php'>
		<li class='tabla-header'>
			<div class='col col-1'>NOMBRE</div>
			<div class='col col-2'>PASSWORD</div>
			<div class='col col-3'>TIPO</div>
			<div class='col col-4'>MODIFICAR</div>
		</li>
		<li class='tabla-fila'>
			<input type='hidden' name='id_usuario' value='$id_usuario'>
			<div class='col col-1' data-label='NOMBRE'><input type='text' name='nombre' value='$nombre'></div>
			<div class='col col-2' data-label='PASSWORD'><input type='password' name='pass'></div>
			<div class='col col-3' data-label='TIPO'>
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
			<div class='col col-4' data-label='MODIFICAR'><input type='submit' onclick='validar_modificar_usuario()' name='modificar' value='Modificar'/></div>
		</li>
		</form></ul></div>";
}
cerrar_conexion($con);
?>