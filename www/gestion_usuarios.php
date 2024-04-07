<?php
echo "<h2>Gestión de usuarios</h2>";
$resultado = obtener_usuarios($con);
$num_filas = obtener_num_filas($resultado);

echo "<table border='1'>
	<form method='post' action='borrarusuarios.php'>
	<tr><td>NOMBRE</td><td>TIPO</td><td>Modificar</td><td>Borrar</td></tr>";
	while($fila = obtener_resultados($resultado)){
		extract($fila);
		echo "<tr><td>$nombre</td><td>";
		if($tipo==0){
			echo "ADMIN";
		}
		else{
			echo "USER";
		}
		echo "</td>
			<td><a href='modificarusuario.php?id=$id_usuario'>Modificar</a></td>
			<td><input type='checkbox' name='borrar[]' value='$id_usuario'</td>";
	}
	echo "<tr><td colspan='4' style='text-align:right'><input type='submit' value='Borrar'/></td></tr>
	</form></table>";

echo "<h3>Crear nuevo usuario</h3>";

echo "<form method='post' action='nuevousuario.php'>
		Nombre:<input type='text' name='nombre'><br/>
		Password:<input type='password' name='pass'><br/>
		Tipo:<select name='tipo'>
			<option value='0'>Admin</option>
			<option value='1'>User</option>
		</select><br/>
		<input type='submit' value='Crear'/></form>";
echo "<hr>";
?>