<?php
// require_once("includes/header.php");
// require_once("database.php");
// $con = conectar();

// echo "<h2>Mis reservas</h2>";
// $resultado = obtener_mis_reservas($con, $_SESSION['logged_user']);
// $num_filas = obtener_num_filas($resultado);
// if($num_filas == 0){
// 	echo "No tienes reservas para hoy<br/>";
// }
// else{
// 	echo "<table border='1'>
// 		<form method='post' action='borrarreservas.php'>
// 		<tr><td>PISTA</td><td>TURNO</td><td>Borrar</td></tr>";
// 		while($fila = obtener_resultados($resultado)){
// 			extract($fila);
// 			echo "<tr><td>$nombre</td>
// 				<td>$turno</td>
// 				<td><input type='checkbox' name='borrar[]' value='$id_reserva'</td>";
// 		}
// 		echo "<tr><td colspan='3' style='text-align:right'><input type='submit' name='Borrar' value='Borrar'/></td></tr>
// 		</form></table>";
// }
// echo "<hr>";
// echo "<h3>Hacer nueva reserva</h3>";
// $pistas = obtener_pistas($con);
// echo "<form method='post' action='nuevareserva.php'>
// 		Pista:<select name='pista'>";
// 		while($fila = obtener_resultados($pistas)){
// 			extract($fila);
// 			echo "<option value='$id_pista'>$nombre</option>";
// 		}
// 	echo "</select><br/>
// 		Turno:<select name='turno'>";
// 		for($i=1;$i<8;$i++){
// 			echo "<option value='$i'>$i</option>";
// 		}
// 	echo "</select><br/>
// 		<input type='submit' value='Reservar'/></form>";
// if(isset($_SESSION["pista_ocupada"])){
// 	echo $_SESSION["pista_ocupada"];
// 	unset($_SESSION["pista_ocupada"]);
// }

session_start();
require_once("database.php");

$con = conectar();

echo "<h2>Bienvenido ". $_SESSION['logged_user_name']."</h2>";


?>