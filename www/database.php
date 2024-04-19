<?php

$host = "local-mysql-bdd";
$user = "db_user";
$pass = "password";
$db_name = "grupo14";
$db_port = 3306;



function conectar(){
	$con = mysqli_connect($GLOBALS["host"], $GLOBALS["user"], $GLOBALS["pass"], $GLOBALS["db_name"], $GLOBALS["db_port"]) or die("Error al conectar con la base de datos");
	mysqli_select_db($con, $GLOBALS["db_name"]);
	return $con;
}

/* La base de datos la crea el Docker
function crear_bdd($con){
	mysqli_query($con, "create database if not exists ".$GLOBALS["db_name"].";");
}*/

/* No la voy a incluir en el fichero init-db.sql

function crear_tabla_pista($con){
	mysqli_query($con, "create table if not exists pista(
	id_pista int auto_increment primary key,
    nombre varchar(255));");
    rellenar_tabla_pistas($con);
}

La voy a incluir en el fichero init-db.sql

function crear_tabla_usuario($con){
	mysqli_query($con, "create table if not exists usuario(
	id_usuario int auto_increment primary key,
    nombre varchar(100),
	pass varchar(255),
	tipo int);");
    crear_admin($con); ACA INCLUYE LA FUNCION DE CREACION DEL ADMIN, YO LO CREO DIRECTAMENTE DESDE INIT-DB
}
La voy a incluir en el fichero init-db.sql

function crear_tabla_reserva($con){
	mysqli_query($con, "create table if not exists reserva(
	id_reserva int auto_increment primary key,
    usuario int,
    pista int,
    turno int,
    foreign key (usuario) references usuario(id_usuario),
    foreign key (pista) references pista(id_pista));");
}*/

/* No la voy a incluir en el fichero init-db.sql
function rellenar_tabla_pistas($con){
	$resultado = obtener_pistas($con);
	if(obtener_num_filas($resultado)==0){
		$pistas = array("Central", "Indoor 2", "Indoor 3", "Indoor 4", "Outdoor 1", "Outdoor 2", "Outdoor 3", "Outdoor 4", "Outdoor 5");
		$stmt = mysqli_prepare($con, "insert into pista(nombre) values(?);");
		foreach($pistas as $pista){
			mysqli_stmt_bind_param($stmt, "s", $pista);
			mysqli_stmt_execute($stmt);
		}
	}
}*/

/* YO LO CREO DIRECTAMENTE DESDE INIT-DB--- SE USARÁ PARA ALGO MÁS?
function crear_admin($con){
	$resultado = existe_admin($con);
	if(obtener_num_filas($resultado)==0){
		$admin_name = "admin";
		$password = password_hash($admin_name, PASSWORD_DEFAULT);
		$admin_type = 0;
		$stmt = mysqli_prepare($con, "insert into usuario(nombre, pass, tipo) values(?,?,?);");
		mysqli_stmt_bind_param($stmt, "ssi", $admin_name, $password, $admin_type);
		mysqli_stmt_execute($stmt);
	}
}*/ 

function existe_admin($con){
	$result = mysqli_query($con, "select * from usuario where tipo=0");
	return $result;
}

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

	/** VALIDACIÓN AQUI */
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

function borrar_usuarios($con, $codigos){
	$consulta = "delete from usuario where id_usuario in (";
	foreach($codigos as $codigo){
		$consulta = $consulta.$codigo.", ";
	}
	$consulta = $consulta."0)";
	mysqli_query($con, $consulta);
}

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
	$result = mysqli_query($con, "select * from usuario where id_usuario = $id");
	return $result;
}

//////////////////////////////////////////////
//////////////////////////////////////////////
//  FUNCIONES CON LA TABLA PISTAS
//////////////////////////////////////////////
//////////////////////////////////////////////

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
}

function obtener_pistas($con){
	$result = mysqli_query($con, "select * from pista");
	return $result;
}

function obtener_pista($con, $id){
	$result = mysqli_query($con, "select * from pista where id_pista = $id");
	return $result;
}*/

//////////////////////////////////////////////
//////////////////////////////////////////////
//  FUNCIONES CON LA TABLA RESERVAS
//////////////////////////////////////////////
//////////////////////////////////////////////

// function crear_reserva($con, $usuario, $turno){
// 	$disponible = comprobar_disponibilidad($con, $pista, $turno);
// 	if($disponible == true){
// 		$stmt = mysqli_prepare($con, "insert into reserva(usuario, pista, turno) values(?, ?, ?);");
// 		mysqli_stmt_bind_param($stmt, "iii", $usuario, $pista, $turno);
// 		$resultado = mysqli_stmt_execute($stmt);
// 		return $resultado;
// 	}
// 	return false;
// }

// function comprobar_disponibilidad($con, $pista, $turno){
// 	$result = mysqli_query($con, "select * from reserva where pista = $pista and turno = $turno");
// 	$reserva = mysqli_fetch_array($result);
// 	if($reserva){
// 		return false;
// 	}
// 	return true;
// }

// function borrar_reservas($con, $codigos){
// 	$consulta = "delete from reserva where id_reserva in (";
// 	foreach($codigos as $codigo){
// 		$consulta = $consulta.$codigo.", ";
// 	}
// 	$consulta = $consulta."0)";
// 	mysqli_query($con, $consulta);
// }

// function borrar_todas_reservas($con){
// 	$consulta = "delete from reserva";
// 	mysqli_query($con, $consulta);
// }

// function obtener_reservas($con){
// 	$result = mysqli_query($con, "select r.id_reserva, u.nombre, p.nombre as nombre_pista, r.turno
// 		from reserva r, pista p, usuario u
// 		where r.usuario = u.id_usuario and r.pista = p.id_pista");
// 	return $result;
// }

// function obtener_mis_reservas($con, $id){
// 	$result = mysqli_query($con, "select id_reserva, usuario, nombre, turno from reserva, pista
// 		where usuario = $id and reserva.pista = pista.id_pista");
// 	return $result;
// }
