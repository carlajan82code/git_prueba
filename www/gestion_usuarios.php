<?php
echo "<h1>Gestión de usuarios</h1>";
$resultado = obtener_usuarios($con);
$num_filas = obtener_num_filas($resultado);

echo "<div class='contenedor-tabla'>
	<ul class='responsive-tabla'>
	<form method='post' action='borrarusuarios.php'>
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
			<div class='col col-unica' style='text-align:right; padding-right:40px;' data-label='ACCIÓN'><input type='submit' value='Borrar'/></div>
	</li>
	</form></ul>
	</div>";
echo "<hr>";
echo "<h1>Crear nuevo usuario</h1>";

echo "<div class='contenedor-tabla'><ul class='responsive-tabla'>
	<form method='post' action='nuevousuario.php'>
	<li class='tabla-header'>
		<div class='col col-1'>NOMBRE</div>
		<div class='col col-2'>PASSWORD</div>
		<div class='col col-3'>TIPO</div>
		<div class='col col-4'>CREAR</div>
	</li>
	<li class='tabla-fila'>
		<div class='col col-1' data-label='NOMBRE'><input type='text' name='nombre'></div>
		<div class='col col-2' data-label='PASSWORD'><input type='password' name='pass'></div>
		<div class='col col-3' data-label='TIPO'>
			<select name='tipo'>
				<option value='0'>Admin</option>
				<option value='1'>User</option>
			</select>
		</div>
		<div class='col col-4' data-label='CREAR'><input type='submit' value='Crear'/></div>
	</li>
	</form></ul></div>";
echo "<hr>";
