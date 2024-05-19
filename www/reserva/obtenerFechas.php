<?php 
session_start();
require('../database.php');
$con = conectar();
$resultado = obtener_mis_reservas($con, $_SESSION['id_usuario']);

$paqueteId = $_GET["paqueteId"];
$data = [];
while($fila = obtener_resultados($resultado)){
    extract($fila);
    if ($paqueteId != $paquete_id){
        continue;
    }
    $data[] = $fecha;
}
echo json_encode($data);