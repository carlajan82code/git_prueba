<?php
require_once("control_sesion.php");
require_once("database.php");

	$proyecto = obtenerProyecto($_GET['proyecto']);
	if($proyecto == 0){
		echo "El proyecto indicado no existe.";
	}
	else{
		echo "<h3>Tareas del proyecto ".$proyecto['nombre']."</h3>";
		$tareas = listarTareasProyecto($_GET['proyecto']);
		echo "<a href='crear_tarea.php?proyecto=".$_GET['proyecto']."'>Crear nueva tarea</a>";
		if(count($tareas) == 0){
			echo "<br/>No hay tareas para este proyecto.<br/>";
		}
		else{
			echo "<table border='1'>
					<tr><td>USUARIO</td><td>NOMBRE</td><td>ESTADO</td>";
				if($_SESSION['tipo_usuario'] == 0){
					echo "<td>ACCIONES</td></tr>";
				}
				else{
					echo "</tr>";
				}
			foreach($tareas as $tarea){
				echo "<tr>
					<td>".$tarea['nombre_usuario']."</td>
					<td>".$tarea['nombre']."</td>
					<td>".$tarea['estado']."</td>";
					if($_SESSION['tipo_usuario'] == 0){
						echo "<td><a href='editar_tarea.php?usuario=".$tarea['id_usuario']."&proyecto=".$tarea['id_proyecto']."'>Editar</a>
							<a href='borrar_tarea.php?usuario=".$tarea['id_usuario']."&proyecto=".$tarea['id_proyecto']."'>Borrar</a>
							</td>";
					}		
					echo "</tr>";
			}
			echo "</table>";
		}
	}
	echo "<a href='admin.php'>Volver</a>";
	cerrarConexion();
?>