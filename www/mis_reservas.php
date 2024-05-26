<?php 
session_start(); ?>

<!--if (isset($_SESSION["id_usuario"])) {
	require_once("vistas/header_login.php");
} else {
    header('Location: index.php');
	die;
}
-->

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="/styles/style.css">
    <title>Mis reservas</title>
</head>
<body>
<?php require_once("vistas/header.php"); ?>
    <main>
        <div class="mis-reservas">
            <title>Mis Reservas</title>
            <h1 class="reserva-titulo">Mis Reservas</h1>
            <div class="reservas-contenedor">
                <div class="listado-reservas">
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
        </div>
        </main>
<?php require_once("vistas/footer.php"); ?>
</body>
</html>