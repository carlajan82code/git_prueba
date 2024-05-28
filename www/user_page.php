<?php
session_start();
require_once ("database.php");
if($_SESSION['accesUser']===false){
    header("Location: login.php");
}
//Hacemos conexión a la Base de Datos
$con = conectar();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
<?php require_once ("vistas/header_login.php"); ?>
<main>
    <h1 class='admin-title'>Bienvenido <?php echo $_SESSION['nombre']; ?></h1>

    <?php
    //Consultamos BBDD Reservas 
    $resultadoPaquete = mysqli_query($con, "SELECT * FROM paquete;");
    ?>
    <form method="post" action="nuevareserva.php" class="formUser">
        <input type="hidden" id="paqueteId" name="paqueteId"/>
        <?php while ($fila = mysqli_fetch_array($resultadoPaquete)): 
            extract ($fila);
        ?>  
            <div class="card">
                <div class="content"> 
                    <div class="title"><?php echo $nombre_paquete; ?></div>
                    <div class="price"><?php echo $precio; ?></div>
                </div>
            <button type="submit" class="btnReserva" onclick="paqueteSeleccionado(<?=$id_paquete?>)">Reservar</button>
            </div>
        <?php
            endwhile; 
        ?>
    </div>
    </form>

    <div class="up-mis-reservas-btn"><a class="texto-entrada--boton" href="mis_reservas.php">Mis reservas</a></div>

    <script src='javaScript/user_page.js'></script>

    <div><p>&nbsp;</p></div>
</main>
<?php require_once ("vistas/footer.php");?>
</body>
</html>