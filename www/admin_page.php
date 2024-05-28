<?php
session_start();
if($_SESSION['accesAdmin']===false){
    header("Location: login.php");
}
require_once("database.php");
$con = conectar();?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/style.css">
    <title>Admin page</title>
</head>
<body>
	<?php include_once("./vistas/header_login.php"); ?>
    <main>
    <?php require_once("gestion_usuarios.php");
    require_once("gestion_reservas.php"); ?>
    </main>
    <?php include_once("./vistas/footer.php"); ?>
</body>
</html>
