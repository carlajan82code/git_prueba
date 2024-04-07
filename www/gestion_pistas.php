<?php
echo "<h2>Gestión de pistas</h2>";
$resultado = obtener_pistas($con);
$num_filas = obtener_num_filas($resultado);
if($num_filas == 0){
	echo "No se encuentran pistas.<br/>";
}
else{
	echo "<table border='1'>
		<form method='post' action='borrarpistas.php'>
		<tr><td>NOMBRE</td><td>Modificar</td><td>Borrar</td></tr>";
		while($fila = obtener_resultados($resultado)){
			extract($fila);
			echo "<tr><td>$nombre</td>
				<td><a href='modificarpista.php?id=$id_pista'>Modificar</a></td>
				<td><input type='checkbox' name='borrar[]' value='$id_pista'</td>";
		}
		echo "<tr><td colspan='3' style='text-align:right'><input type='submit' value='Borrar'/></td></tr>
		</form></table>";
}

echo "<h3>Crear nueva pista</h3>";

echo "<form method='post' action='nuevapista.php'>
		Nombre:<input type='text' name='nombre'><br/>
		<input type='submit' value='Crear'/></form>";
echo "<hr>";
?>