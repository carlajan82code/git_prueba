<?php

$host = "local-mysql-bdd";
$user = "db_user";
$pass = "password";
$db_name = "grupo14";
$db_port = 3306;


function conectar(){
	$con = mysqli_connect($GLOBALS["host"], $GLOBALS["user"], $GLOBALS["pass"], $GLOBALS["db_name"], $GLOBALS["db_port"]) or die("Error al conectar con la base de datos");
	// mysqli_select_db($con, $GLOBALS["db_name"]);
	return $con;
}

/*function existe_admin($con){
	$result = mysqli_query($con, "select * from usuario where tipo=0");
	return $result;
}*/

function existe_admin($con){
    $stmt = mysqli_prepare($con, "SELECT * FROM usuario WHERE tipo = ?");
    $tipo_admin = 0;
    mysqli_stmt_bind_param($stmt, "i", $tipo_admin);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    mysqli_stmt_close($stmt);

    return $result;
}

// No se le aplica consulta preparada
function obtener_num_filas($resultado){
	return mysqli_num_rows($resultado);
}

function login($con, $mail, $contrasena){
	$con=conectar();
	$hash_contrasena = hash("sha512", $contrasena);
    $stmt = $con->prepare("SELECT *
                        FROM usuario
                        WHERE mail=?
                        AND pass =?;");
    $stmt->bind_param("ss", $mail, $hash_contrasena);
    $stmt->execute();
    $usuario = $stmt->get_result();
    cerrar_conexion($con);
    return mysqli_fetch_array($usuario);
}

function obtener_resultados($resultado){
	return mysqli_fetch_array($resultado);
}

function cerrar_conexion($con){
	mysqli_close($con);
}

//////////////////////////////////////////////
//////////////////////////////////////////////
//  FUNCIONES CON LA TABLA USUARIOS
//////////////////////////////////////////////
//////////////////////////////////////////////

function crear_usuario($con, $nombre, $pass, $tipo){
	$password = password_hash($pass, PASSWORD_DEFAULT);
	$stmt = mysqli_prepare($con, "insert into usuario(nombre, pass, tipo) values(?,?,?);");
	mysqli_stmt_bind_param($stmt, "ssi", $nombre, $password, $tipo);
	return mysqli_stmt_execute($stmt);
	//return $resultado;
}

/*
function borrar_usuario($con, $id){
    $stmt = $con->prepare("DELETE FROM usuario WHERE id_usuario = (?);");
    $stmt->bind_param("i", $id);
    $stmt->execute();
	$stmt->close();
    cerrar_conexion($con);
}*/

// ELIMINA VARIOS USUARIOS A LA VES
function borrar_usuarios($con, $codigos){
	$consulta = "delete from usuario where id_usuario in (";
	foreach($codigos as $codigo){
		$consulta = $consulta.$codigo.", ";
	}
	$consulta = $consulta."0)";
	mysqli_query($con, $consulta);
}

/* LA QUITO PORQUE GENERA WARNINGS QUE IMPIDEN QUE LA REDIRECCIÓN FUNCIONE 
function borrar_usuarios($con, $codigos){
    $placeholders = rtrim(str_repeat('?,', count($codigos)), ',');
    $consulta = "DELETE FROM usuario WHERE id_usuario IN ($placeholders)";
    $stmt = mysqli_prepare($con, $consulta);
    $types = str_repeat('i', count($codigos)); // 'i' para entero
    $params = array_merge([$stmt, $types], $codigos);
    call_user_func_array('mysqli_stmt_bind_param', $params);
    $resultado = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    return $resultado;
}*/

function modificar_usuario($con, $id_usuario, $nombre, $pass, $tipo){
	$password = password_hash($pass, PASSWORD_DEFAULT);
	$stmt = mysqli_prepare($con, "update usuario set nombre=?, pass=?, tipo=? where id_usuario=?");
	mysqli_stmt_bind_param($stmt, "ssii", $nombre, $password, $tipo, $id_usuario);
	mysqli_stmt_execute($stmt);
}

function obtener_usuarios($con){
	$result = mysqli_query($con, "select * from usuario");
	return $result;
}

function obtener_usuario($con, $id){
    $stmt = mysqli_prepare($con, "SELECT * FROM usuario WHERE id_usuario = ?");
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    mysqli_stmt_close($stmt);

    return $result;
}

/*function obtener_usuario($con, $id){
	$result = mysqli_query($con, "select * from usuario where id_usuario = $id");
	return $result;
}*/

//////////////////////////////////////////////
//////////////////////////////////////////////
//  FUNCIONES CON LA TABLA PAQUETE
//////////////////////////////////////////////
//////////////////////////////////////////////
// vamos a querer que el admin cree paquetes? si no, esto no lo incluimos DE MOMENTO LAS DEJO

/*function crear_pista($con, $nombre){
	$stmt = mysqli_prepare($con, "insert into pista(nombre) values(?);");
	mysqli_stmt_bind_param($stmt, "s", $nombre);
	return mysqli_stmt_execute($stmt);
	//return $resultado;
}

function borrar_pistas($con, $codigos){
	$consulta = "delete from pista where id_pista in (";
	foreach($codigos as $codigo){
		$consulta = $consulta.$codigo.", ";
	}
	$consulta = $consulta."0)";
	mysqli_query($con, $consulta);
}

function modificar_pista($con, $id_pista, $nombre){
	$stmt = mysqli_prepare($con, "update pista set nombre=? where id_pista=?");
	mysqli_stmt_bind_param($stmt, "si", $nombre, $id_pista);
	mysqli_stmt_execute($stmt);
} */

function obtener_paquetes($con){
	$result = mysqli_query($con, "select * from paquete");
	return $result;
}

function obtener_paquete($con, $id){
    $stmt = mysqli_prepare($con, "SELECT * FROM paquete WHERE id_paquete = ?");
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    mysqli_stmt_close($stmt);

    return $result;
}

/*function obtener_paquete($con, $id){
	$result = mysqli_query($con, "select * from paquete where id_paquete = $id");
	return $result;
}*/

//////////////////////////////////////////////
//////////////////////////////////////////////
//  FUNCIONES CON LA TABLA RESERVAS
//////////////////////////////////////////////
//////////////////////////////////////////////

 function crear_reserva($con, $usuario, $fecha, $paquete){
 	$disponible = comprobar_disponibilidad($con, $paquete, $fecha);
 	if($disponible == true){
 		$stmt = mysqli_prepare($con, "insert into reserva(usuario, fecha, paquete) values(?, ?, ?);");
 		mysqli_stmt_bind_param($stmt, "iii", $usuario, $fecha, $paquete);
 		$resultado = mysqli_stmt_execute($stmt);
 		return $resultado;
 	}
 	return false;
 }

 function comprobar_disponibilidad($con, $paquete, $fecha){
    $stmt = mysqli_prepare($con, "SELECT * FROM reserva WHERE paquete = ? AND fecha = ?");
    mysqli_stmt_bind_param($stmt, "is", $paquete, $fecha);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $reserva = mysqli_fetch_array($result);
    mysqli_stmt_close($stmt);

    if($reserva){
        return false;
    }
    return true;
}

//  function comprobar_disponibilidad($con, $paquete, $fecha){
//  	$result = mysqli_query($con, "select * from reserva where paquete = $paquete and fecha = $fecha");
//  	$reserva = mysqli_fetch_array($result);
//  	if($reserva){
//  		return false;
//  	}
//  	return true;
//  }

/* function borrar_reservas($con, $codigos){
 	$consulta = "delete from reserva where id_reserva in (";
 	foreach($codigos as $codigo){
 		$consulta = $consulta.$codigo.", ";
 	}
 	$consulta = $consulta."0)";
 	mysqli_query($con, $consulta);
 } */

 /* CON CONSULTA PREPARADA */

 function borrar_reservas($con, $codigos){
    $placeholders = rtrim(str_repeat('?,', count($codigos)), ',');
    $consulta = "DELETE FROM reserva WHERE id_reserva IN ($placeholders)";
    $stmt = mysqli_prepare($con, $consulta);
    $types = str_repeat('i', count($codigos));
    $params = array_merge([$stmt, $types], $codigos);
    call_user_func_array('mysqli_stmt_bind_param', $params);
    $resultado = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    return $resultado;
}

 /*NO necesito aplicar una consulta preparada, NO APLICAMOS EL BORRAR TODAS A LA VEZ*/
 /*function borrar_todas_reservas($con){
 	$consulta = "delete from reserva";
 	mysqli_query($con, $consulta);
 }*/

/* function obtener_reservas($con){
 	$result = mysqli_query($con, "select r.id_reserva, u.nombre, p.nombre_paquete as nombre_paquete, r.fecha
 		from reserva r, paquete p, usuario u
 		where r.usuario = u.id_usuario and r.paquete = p.id_paquete");
 	return $result;
 }*/

 // lo puedo escribir con consulta preparada
 function obtener_reservas($con){
    $consulta = "SELECT r.id_reserva, u.nombre, p.nombre_paquete AS nombre_paquete, r.fecha
                FROM reserva r
                INNER JOIN paquete p ON r.paquete = p.id_paquete
                INNER JOIN usuario u ON r.usuario = u.id_usuario";

    $stmt = mysqli_prepare($con, $consulta);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    mysqli_stmt_close($stmt);

    return $result;
}

/* function obtener_mis_reservas($con, $id){
 	$result = mysqli_query($con, "select id_reserva, usuario, nombre, fecha from reserva, paquete
 		where usuario = $id and reserva.paquete = paquete.id_paquete");
 	return $result;
 }*/

 function obtener_mis_reservas($con, $id){
    $consulta = "SELECT id_reserva, usuario, nombre, fecha 
                 FROM reserva 
                 INNER JOIN paquete ON reserva.paquete = paquete.id_paquete 
                 WHERE usuario = ?";
    $stmt = mysqli_prepare($con, $consulta);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    mysqli_stmt_close($stmt);

    return $result;
}

?>