function ValidaEmail(email) {
  var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  return emailRegex.test(email);
}

//  La contraseña debe tener al menos 8 caracteres, incluyendo al menos una letra mayúscula, una letra minúscula y un número.
function ValidarPassword(contrasena) {
  var passRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/;
  if (passRegex.test(contrasena)) {
    return true; // La contraseña es válida.
  } else {
    return false; // La contraseña no cumple con los criterios especificados.
  }
}

/* ---- VALIDACION REGISTRO ---- */
function validar_registro() {
  let nombre = document.getElementById("nombre").value;
  let mail = document.getElementById("mail").value;
  let password = document.getElementById("contrasena").value;
  let confirmPassword = document.getElementById("conf_contrasena").value;
  let validacion = true;

  // Limpiar mensajes de error
  let errorPrevioNombre = document.querySelector("#nombre_registro p");
  if (errorPrevioNombre) {
    errorPrevioNombre.remove();
  }
  let errorPrevioEmail = document.querySelector("#email_registro p");
  if (errorPrevioEmail) {
    errorPrevioEmail.remove();
  }
  let errorPrevioPassword = document.querySelector("#contrasena_registro p");
  if (errorPrevioPassword) {
    errorPrevioPassword.remove();
  }
  let errorPrevioConfPass = document.querySelector("#conf_registro p");
  if (errorPrevioConfPass ) {
    errorPrevioConfPass .remove();
  }

  // Validar nombre
  if (nombre === "") {
      let contenido_nombre = document.getElementById("nombre_registro");
      let parrafo = document.createElement("p");
      parrafo.style.color = '#F5E644';
      parrafo.textContent = "El nombre debe estar completo.";
      contenido_nombre.appendChild(parrafo);
      validacion = false;
  }

  // Validar correo 
  if (!ValidaEmail(mail)) {
      let contenido_email_registro = document.getElementById("email_registro");
      let mensaje = document.createElement("p");
      mensaje.style.color = '#F5E644';
      mensaje.textContent = `Correo no válido: ${mail} El correo debe contener un '@'`;
      contenido_email_registro.appendChild(mensaje);
      validacion = false;
  }

  // Validar contraseña
  if (!ValidarPassword(password)) {
      let contenido_pass_registro = document.getElementById("contrasena_registro");
      let mensaje = document.createElement("p");
      mensaje.style.color = '#F5E644';
      mensaje.textContent = "La contraseña debe tener al menos 8 caracteres, incluyendo una letra mayúscula, una letra minúscula y un número.";
      contenido_pass_registro.appendChild(mensaje);
     
  } else if (password !== confirmPassword) {
      let contenido_confirm_pass_registro = document.getElementById("conf_registro");
      let mensaje = document.createElement("p");
      mensaje.style.color = '#F5E644';
      mensaje.textContent = "Las contraseñas no coinciden.";
      contenido_confirm_pass_registro.appendChild(mensaje);
      validacion = false;
  }

  if (validacion) {
      location.href = "registro_validacion.php";
      return true;
  }

  return false; // Detener el envío del formulario si hay errores de validación
}

/* ---- VALIDACION LOGIN ---- */

function validar_login() {
  var mail = document.getElementById("mail").value;
  var password = document.getElementById("contrasena").value;
  var validacion= true;

  // Limpiar mensajes de errores
  var errorPrevioMail = document.querySelector("#email_login p");
  if (errorPrevioMail) {
      errorPrevioMail.remove();
  }
  var errorPrevioPass = document.querySelector("#pass_login p");
  if (errorPrevioPass) {
    errorPrevioPass.remove();
  }

  // Validar correo electrónico
  if (!ValidaEmail(mail)) {
      let contenido_email = document.getElementById("email_login");
      let parrafo = document.createElement("p");
      parrafo.style.color = '#F5E644';
      parrafo.textContent = `Usuario no válido: ${mail} El correo debe contener un '@'.`;
      contenido_email.appendChild(parrafo);
      validacion = false;
  }

  // Validar contraseña
  if (!ValidarPassword(password)) {
      let contenido_pass = document.getElementById("pass_login");
      let mensaje = document.createElement("p");
      mensaje.style.color = '#F5E644';
      mensaje.textContent = "Contraseña incorrecta. Debe tener al menos 8 caracteres, incluyendo un número y una letra.";
      contenido_pass.appendChild(mensaje);
      validacion = false;
  }

  return validacion;
}



/* ---- VALIDACION FORMULARIO DE CONTACTO ---- */
function validar_formulario_contacto() {
  let validacion = true;

  // Obtener valores
  let nombre = document.getElementById("nombre").value;
  let mail = document.getElementById("mail").value;
  let telefono = document.getElementById("telefono").value;
  let direccion1 = document.getElementById("direccion1").value;
  let ciudad = document.getElementById("ciudad").value;
  let estado = document.getElementById("estado").value;
  let codigo_postal = document.getElementById("codigoPostal").value;
  let pais = document.getElementById("selectorPais").value;
  let anio = document.getElementById("anio_nacimiento").value;

 
  // Nombre
  let contenido_nombre = document.getElementById("div-nombre");
  let errorNombre = contenido_nombre.getElementsByTagName("p");
  if (nombre == "") {
    validacion = false;
    if (errorNombre.length == 0) {
      let parrafo = document.createElement("p");
      parrafo.style.color = "yellow";
      parrafo.textContent = "Nombre es requerido";
      contenido_nombre.appendChild(parrafo);
    }
  } else {
    if (errorNombre.length > 0) {
      contenido_nombre.removeChild(errorNombre[0]);
    }
  }

  //mail
  let contenido_mail = document.getElementById("div-mail");
  let errorMail = contenido_mail.getElementsByTagName("p");
  if (mail == "") {
    validacion = false;
    if (errorMail.length == 0) {
      let parrafo = document.createElement("p");
      parrafo.style.color = "yellow";
      parrafo.textContent = "Mail requerido";
      contenido_mail.appendChild(parrafo);
    }
  } else {
    if (errorMail.length > 0) {
      contenido_mail.removeChild(errorMail[0]);
    }
  }

  //telefono
  let contenido_telefono = document.getElementById("div-telefono");
  let errorTelefono = contenido_telefono.getElementsByTagName("p");
  if (telefono == "") {
    validacion = false;
    if (errorTelefono.length == 0) {
      let parrafo = document.createElement("p");
      parrafo.style.color = "yellow";
      parrafo.textContent = "Teléfono es requerido";
      contenido_telefono.appendChild(parrafo);
    }
  } else {
    if (errorTelefono.length > 0) {
      contenido_telefono.removeChild(errorTelefono[0]);
    }
  }
  //direccion 1
  let contenido_direccion1 = document.getElementById("div-direccion_1");
  let errorDireccion1 = contenido_direccion1.getElementsByTagName("p");
  if (direccion1 == "") {
    validacion = false;
    if (errorDireccion1.length == 0) {
      let parrafo = document.createElement("p");
      parrafo.style.color = "yellow";
      parrafo.textContent = "Dirección principal requerida";
      contenido_direccion1.appendChild(parrafo);
    }
  } else {
    if (errorDireccion1.length > 0) {
      contenido_direccion1.removeChild(errorDireccion1[0]);
    }
  }

  //Ciudad
  let contenido_ciudad = document.getElementById("div-ciudad");
  let errorCiudad = contenido_ciudad.getElementsByTagName("p");
  if (ciudad == "") {
    validacion = false;
    if (errorCiudad.length == 0) {
      let parrafo = document.createElement("p");
      parrafo.style.color = "yellow";
      parrafo.textContent = "Ciudad requerida";
      contenido_ciudad.appendChild(parrafo);
    }
  } else {
    if (errorCiudad.length > 0) {
      contenido_ciudad.removeChild(errorCiudad[0]);
    }
  }

  //estado
  let contenido_estado = document.getElementById("div-estado");
  let error_estado = contenido_estado.getElementsByTagName("p");
  if (estado == "") {
    validacion = false;
    if (error_estado.length == 0) {
      let parrafo = document.createElement("p");
      parrafo.style.color = "yellow";
      parrafo.textContent = "Estado es requerido";
      contenido_estado.appendChild(parrafo);
    }
  } else {
    if (errorNombre.length > 0) {
      contenido_estado.removeChild(error_estado[0]);
    }
  }

  //código postal
  let contenido_codigoPostal = document.getElementById("div-codigoP");
  let error_codigoPostal = contenido_codigoPostal.getElementsByTagName("p");
  if (codigo_postal == "") {
    validacion = false;
    if (error_codigoPostal.length == 0) {
      let parrafo = document.createElement("p");
      parrafo.style.color = "yellow";
      parrafo.textContent = "Código postal es requerido";
      contenido_codigoPostal.appendChild(parrafo);
    }
  } else {
    if (errorNombre.length > 0) {
      contenido_codigoPostal.removeChild(error_codigoPostal[0]);
    }
  }

  //pais
  let contenido_pais = document.getElementById("div-pais");
  let errorPais = contenido_pais.getElementsByTagName("p");
  if (pais == "") {
    validacion = false;
    if (errorPais.length == 0) {
      let parrafo = document.createElement("p");
      parrafo.style.color = "yellow";
      parrafo.textContent = "País es requerido";
      contenido_pais.appendChild(parrafo);
    }
  } else {
    if (errorNombre.length > 0) {
      contenido_pais.removeChild(errorPais[0]);
    }
  }

  // año
  let contenido_anio = document.getElementById("div-anio");
  let errorAnio = contenido_anio.getElementsByTagName("p");
  if (anio == "") {
    validacion = false;
    if (errorAnio.length == 0) {
      let parrafo = document.createElement("p");
      parrafo.style.color = "yellow";
      parrafo.textContent = "Año de nacimiento es requerido";
      contenido_anio.appendChild(parrafo);
    }
  } else {
    if (errorAnio.length > 0) {
      contenido_anio.removeChild(errorAnio[0]);
    }
  }

  if (mail != "" && !ValidaEmail(mail)) {
    let contenido_mail = document.getElementById("div-mail");
    let parrafo = document.createElement("p");
    contenido_mail.appendChild(parrafo);
    parrafo.innerHTML =
      "<p style='color:yellow'>Correo no válido " +
      mail +
      " formato no correcto</p>";
    validacion = false;
  }

  return validacion;
}

/* ---- VALIDACION CREAR MODIFICAR USUARIO ---- */

function validar_crearModificar_usuario() {
  let contenedor_nombre = document.getElementById("contenedor_nombre");
  let nombre = contenedor_nombre.getElementsByTagName("input")[0].value;
  let contenedor_contrasena = document.getElementById("contenedor_contrasena");
  let contrasena = contenedor_contrasena.getElementsByTagName("input")[0].value;
  let contenedor_mail = document.getElementById("contenedor_mail");
  let mail = contenedor_mail.getElementsByTagName("input")[0].value;

  let errorNombre = contenedor_nombre.getElementsByTagName("p");
  let errorContrasena = contenedor_contrasena.getElementsByTagName("p");
  let errorMail = contenedor_mail.getElementsByTagName("p");

  if (nombre == "") { //Si está vacío
    if (errorNombre.length == 0) { //Si todavía no hay un mensaje de error
      let mensaje_error = document.createElement("p");
      mensaje_error.style.color = "yellow";
      mensaje_error.textContent = "Nombre es requerido";
      contenedor_nombre.appendChild(mensaje_error);
    }
  } else { //Si no está vacío
    if (errorNombre.length > 0) {
      contenedor_nombre.removeChild(errorNombre[0]);
    }
  }
  if (!ValidarPassword(contrasena)) {
    if(errorContrasena.length == 0){
      let mensaje_error = document.createElement("p");
      mensaje_error.style.color = "yellow";
      mensaje_error.textContent = "La contraseña debe tener al menos 8 caracteres, incluyendo al menos una letra mayúscula, una letra minúscula y un número.";
      contenedor_contrasena.appendChild(mensaje_error);
    }
  }else { //Si no está vacío
    if (errorContrasena.length > 0) {
      contenedor_contrasena.removeChild(errorNombre[0]);
    }
  }

  if (!ValidaEmail(mail)) {
    if(errorMail.length == 0){
      let mensaje_error = document.createElement("p");
      mensaje_error.style.color = "yellow";
      mensaje_error.textContent = "Mail no valido";
      contenedor_mail.appendChild(mensaje_error);
    }
  }else { //Si no está vacío
    if (errorMail.length > 0) {
      contenedor_mail.removeChild(errorNombre[0]);
    }
  }

  if (nombre != "" && ValidarPassword(contrasena) && ValidaEmail(mail)) {
    return true;
  } else {
    return false;
  }

}

/* ---- VALIDACION RESERVA ---- */
function validarReserva(){
  let fecha = document.getElementById("fecha").value;
  let errorLabel = document.getElementById("error");
  if (fecha === "") {
      errorLabel.innerText = "Por favor introduzca una fecha correcta";
      return false; // Evitar que el formulario se envíe si no se selecciona una fecha
  }
  errorLabel.innerText = "";
  return true;
}

// control de errores al borrar usuarios y reservas

// funcion para poder habilitar el boton de borrar usuario, unicamente si hay por lo menos un elemento seleccionado

  document.addEventListener('DOMContentLoaded', function() {
    // Selecciona todos los checkboxes dentro del formulario 'form_usuarios'
    var checkboxes = document.querySelectorAll("form[name='form_usuarios'] input[type='checkbox']");
    var deleteButton = document.getElementById("borrar_usuario");

    function toggleDeleteButton() {
        // Comprueba si al menos un checkbox está marcado
        var isChecked = Array.from(checkboxes).some(function(checkbox) {
            return checkbox.checked;
        });
        deleteButton.disabled = !isChecked;
    }

    // Agrega un evento de cambio a cada checkbox
    checkboxes.forEach(function(checkbox) {
        checkbox.addEventListener('change', toggleDeleteButton);
    });
  });

  // De la misma manera para el caso de las reservas 

  document.addEventListener('DOMContentLoaded', function() {
    // Selecciona todos los checkboxes dentro del formulario 'form_usuarios'
    var checkboxes = document.querySelectorAll("form[name='form_reservas'] input[type='checkbox']");
    var deleteButton = document.getElementById("borrar_reserva");

    function toggleDeleteButton() {
        // Comprueba si al menos un checkbox está marcado
        var isChecked = Array.from(checkboxes).some(function(checkbox) {
            return checkbox.checked;
        });
        deleteButton.disabled = !isChecked;
    }

    // Agrega un evento de cambio a cada checkbox
    checkboxes.forEach(function(checkbox) {
        checkbox.addEventListener('change', toggleDeleteButton);
    });
  });