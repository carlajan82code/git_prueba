<?php
echo "<h1>Gestión de Reservas</h1>";
$resultado = obtener_reservas($con);
$num_filas = obtener_num_filas($resultado);
<<<<<<< HEAD
if($num_filas == 0){
	echo "<div>No hay reservas</div><br/>";
}
else{
=======
if ($num_filas == 0) {
	echo "No hay reservas.<br/>";
} else {
>>>>>>> 5d6b1c965d65f41bc2ef32d15de0697eb3a54965
	echo "<div class='contenedor-tabla'><ul class='responsive-tabla'>
		<form method='post' action='borrarreservas.php'>
		<li class='tabla-header'>
			<div class='col col-1'>USUARIO</div>
			<div class='col col-2'>PAQUETE</div>
			<div class='col col-3'>FECHA</div>
			<div class='col col-4'>BORRAR</div>
		</li>";
	while ($fila = obtener_resultados($resultado)) {
		extract($fila);
		echo "<li class='tabla-fila'>
				<div class='col col-1' data-label='NOMBRE'>$nombre</div>
				<div class='col col-2' data-label='PAQUETE'>$nombre_paquete</div>
				<div class='col col-3' data-label='FECHA'>$fecha</div>
				<div class='col col-4' data-label='BORRAR'><input type='checkbox' name='borrar[]' value='$id_reserva'></div>
				</li>";
	}
	echo "<li class='tabla-fila'>
		<div class='col col-unica' style='text-align:right; padding-right:40px;' data-label='ACCIÓN'><input type='submit' name='Borrar' value='Borrar'/></div>
		</li>
		</form></ul></div>";
}
