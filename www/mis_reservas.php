<?php 
session_start();
if (isset($_SESSION["id_usuario"])) {
	require_once("vistas/header_login.php");
} else {
    header('Location: index.php');
	die;
}
?>
<title>Mis Reservas</title>
<h1>Mis Reservas</h1>
<?php 
require('database.php');
$con = conectar();
$resultado = obtener_mis_reservas($con, $_SESSION['id_usuario']);
$num_filas = obtener_num_filas($resultado);
if($num_filas == 0){
    echo "No tienes reservas para hoy";
}

while($fila = obtener_resultados($resultado)){
    extract($fila);
    ?>
    <div>
        <label><?=$id_reserva?></label>
        <label><?=$fecha?></label>
        <label><?=$nombre?></label>
    </div>
<?php
}
?>