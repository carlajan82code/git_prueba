
document.addEventListener("DOMContentLoaded", async function() {
    //Obtener input date
    const inputFecha = document.getElementById("fecha");
    // Días a deshabilitar (en formato 'yyyy-mm-dd')
    const fechasOcupadas = await obtenerFechas();

    // Listener para evitar la selección de días deshabilitados
    inputFecha.addEventListener("input", function(event) {
        const fechaSeleccionada = event.target.value;
        if (esDiaDeshabilitado(fechaSeleccionada, fechasOcupadas)) {
            // Limpiar el valor si es una fecha deshabilitada
            event.target.value = "";
            alert("Este día no está disponible para seleccionar.");
        }
    });
}); 

// Función para comprobar si un día está deshabilitado
function esDiaDeshabilitado(fecha, fechasOcupadas) {
    return fechasOcupadas.includes(fecha);
}

async function obtenerFechas(){
    const paqueteId = document.getElementById("paqueteId").value;
    const response = await fetch('../reserva/obtenerFechas.php?paqueteId=' + paqueteId, {
        method: 'GET'
      });
    if (!response.ok) 
        throw new Error('Network response was not ok');
    return await response.json();
    //return await response.text();
}