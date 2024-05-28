<?php
session_start();
unset($_SESSION['accesAdmin']);
unset($_SESSION['accesUser']);
session_destroy();
header("Location: ../index.php");
?>