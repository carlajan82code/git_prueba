<?php
session_start();
require_once ("vistas/header.php");
require_once ("database.php");

//Hacemos conexión a la Base de Datos
$con = conectar();
?>

<h1>Bienvenido <?php echo $_SESSION['nombre']; ?></h1>

<?php
//Consultamos BBDD Reservas 
$resultadoPaquete = mysqli_query($con, "SELECT * FROM paquete;");
?>

<h2>Formulario Reservas</h2>

    <form action="">
    <select name="select">
       <?php while ($fila = mysqli_fetch_array($resultadoPaquete)): 
            extract ($fila);
        ?>  
            <option value="<?php echo $id_paquete; ?>"> <?php echo $nombre_paquete; ?> </option>  

        <?php
            endwhile; 
        ?>
    </select>

        <label>Fecha del Viaje </label>
        <input type="date" name="fecha" id="fecha">

    </form>

<h2>Mis reservas</h2>;

<?php 
// $resultado = obtener_mis_reservas($con, $_SESSION['id']);
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


//while ($Reserva = mysqli_fetch_assoc($query) )


?>

<table class="reservas">
    <thead>
        <tr>
            <th>ID</th>
            <th>Titulo</th>
            <th>Precio</th>
            <th>Paquete</th>
        </tr>
    </thead>       

    <tbody>
        <tr>
            <td>1</td>
            <td>Hostal Hosgmead</td>
            <td>10000€</td>
        </tr>
    </tbody>
</table>
