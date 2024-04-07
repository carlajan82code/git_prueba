<?php
require_once("includes/header.php");
require_once("database.php");
$con = conectar();

if(isset($_POST["modificar"])){
	modificar_usuario($con, $_SESSION['id_usuario'], $_POST["nombre"], $_POST["pass"], $_POST["tipo"]);
	unset($_SESSION['id_usuario']);
	header('Location: admin_page.php');
}
else{
	$id_usuario = $_GET["id"];
	$_SESSION['id_usuario'] = $id_usuario;
	$resultado = obtener_usuario($con, $id_usuario);
	$num_filas = obtener_num_filas($resultado);
	if($num_filas == 0){
		header("Location: admin_page.php");
	}
	else{
		$datos_usuario = obtener_resultados($resultado);
		extract($datos_usuario);
		echo "<form method='post' action='".$_SERVER['PHP_SELF']."'>
			Nombre:<input type='text' name='nombre' value='$nombre'><br/>
			Password:<input type='password' name='pass'><br/>
			Tipo:<select name='tipo'>";
			if($tipo == 0){
				echo "<option value='0' selected>Admin</option>";
				echo "<option value='1'>User</option>";
			}
			else{
				echo "<option value='0'>Admin</option>";
				echo "<option value='1' selected>User</option>";
			}
		echo "</select><br/>
			<input type='submit' name='modificar' value='Modificar'/>
			</form>";
	}
}

cerrar_conexion($con);
?>