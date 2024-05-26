<?php 
session_start();
if (isset($_SESSION["id_usuario"])) {
	require_once("vistas/header_login.php");
} else {
    header('Location: index.php');
	die;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="/styles/style.css">
    <title>Mis reservas</title>
</head>
<body id="mis-reservas-body">
    <title>Mis Reservas</title>
    <h1>Mis Reservas</h1>
    <div id="reservas-contenedor">
        <div id="listado-reservas">
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
                    <label><strong><?=$fecha?></strong></label>
                    <label><?=$nombre?></label>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
<?php require_once("vistas/footer.php"); ?>
</body>