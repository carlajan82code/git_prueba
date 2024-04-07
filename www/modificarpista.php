<?php
require_once("includes/header.php");
require_once("database.php");
$con = conectar();

if(isset($_POST["modificar"])){
	modificar_pista($con, $_SESSION['id_pista'], $_POST["nombre"]);
	unset($_SESSION['id_pista']);
	header('Location: admin_page.php');
}
else{
	$id_pista = $_GET["id"];
	$_SESSION['id_pista'] = $id_pista;
	$resultado = obtener_pista($con, $id_pista);
	$num_filas = obtener_num_filas($resultado);
	if($num_filas == 0){
		header("Location: admin_page.php");
	}
	else{
		$datos_pista = obtener_resultados($resultado);
		extract($datos_pista);
		echo "<form method='post' action='".$_SERVER['PHP_SELF']."'>
			Nombre:<input type='text' name='nombre' value='$nombre'><br/>
			<input type='submit' name='modificar' value='Modificar'/>
			</form>";
	}
}

cerrar_conexion($con);
?>