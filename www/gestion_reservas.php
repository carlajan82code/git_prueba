<?php
echo "<h2>Gestión de Reservas</h2>";
$resultado = obtener_reservas($con);
$num_filas = obtener_num_filas($resultado);
if($num_filas == 0){
	echo "No hay reservas.<br/>";
}
else{
	echo "<table border='1'>
		<form method='post' action='borrarreservas.php'>
		<tr><td>USUARIO</td><td>PISTA</td><td>TURNO</td><td>Borrar</td></tr>";
		while($fila = obtener_resultados($resultado)){
			extract($fila);
			echo "<tr><td>$nombre</td><td>$nombre_pista</td><td>$turno</td>
				<td><input type='checkbox' name='borrar[]' value='$id_reserva'</td>";
		}
		echo "<tr><td colspan='4' style='text-align:right'><input type='submit' name='Borrar' value='Borrar'/></td></tr>
		</form></table>";
}

echo "<form method='post' action='borrarreservas.php'>
		<input type='submit' name='BorrarTodas' value='Borrar todas'/></form>";
?>