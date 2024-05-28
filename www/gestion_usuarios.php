<?php
if(isset($_SESSION['accesAdmin'])){
echo "<h1 class='admin-title'>Gestión de usuarios</h1>";
$resultado = obtener_usuarios($con);
$num_filas = obtener_num_filas($resultado);

echo "<div class='contenedor-tabla'>
	<ul class='responsive-tabla'>
	<form method='post' action='borrarusuarios.php' name='form_usuarios' id='form_usuarios'>
	<li class='tabla-header'>
		<div class='col col-1'>NOMBRE</div>
		<div class='col col-2'>TIPO</div>
		<div class='col col-3'>MODIFICAR</div>
		<div class='col col-4'>BORRAR</div>
	</li>";
while ($fila = obtener_resultados($resultado)) {
	extract($fila);
	echo "<li class='tabla-fila'>
			<div class='col col-1' data-label='NOMBRE'>$nombre</div>
			<div class='col col-2' data-label='TIPO'>";
	if ($tipo == 0) {
		echo "ADMIN";
	} else {
		echo "USER";
	}
	echo "</div>
			<div class='col col-3' data-label='MODIFICAR'><a href='modificarusuario.php?id=$id_usuario'>Modificar</a></div>
			<div class='col col-4' style='text-align:center;' data-label='BORRAR'><input type='checkbox' name='borrar[]' value='$id_usuario'</div>
		</li>";
}
echo "<li class='tabla-fila'>
			<div class='col col-unica' style='text-align:right; padding-right:40px;' data-label='ACCIÓN'><input type='submit' name='borrar_usuario' id='borrar_usuario' value='Borrar' disabled /></div>
	</li>
	</form></ul>
	</div>
	<hr>";
echo "<h1 class='admin-title'>Crear nuevo usuario</h1>

    <div class='contenedor-tabla'><ul class='responsive-tabla'>
	<form method='post' action='nuevousuario.php' onsubmit='return validar_crearModificar_usuario();'>
	<li class='tabla-header'>
		<div class='col col-1'>NOMBRE</div>
		<div class='col col-2'>MAIL</div>
		<div class='col col-3'>PASSWORD</div>
		<div class='col col-4'>TIPO</div>
	</li>
	<li class='tabla-fila'>
		<div class='col col-1' data-label='NOMBRE' id='contenedor_nombre'><input type='text' name='nombre'></div>
		<div class='col col-2' data-label='MAIL' id='contenedor_mail'><input type='email' name='mail'/></div>
		<div class='col col-3' data-label='PASSWORD' id='contenedor_contrasena'><input type='password' name='contrasena'></div>
		<div class='col col-4' data-label='TIPO'>
			<select name='tipo'>
				<option value='0'>Admin</option>
				<option value='1'>User</option>
			</select>
		</div>
	</li>
	<li class='tabla-fila'>
			<div class='col col-unica' style='text-align:right; padding-right:40px;' data-label='ACCIÓN'><input type='submit' value='Crear'/></div>
	</li>
	</form></ul></div>
	<script src='javaScript/validacion.js'></script>
	<hr>";
}
else{
	header("Location: login.php");
}
?>
