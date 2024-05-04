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

  if (nombre == "") {
    let contenido_nombre = document.getElementById("nombre_registro");
    let parrafo = document.createElement("p");
    contenido_nombre.appendChild(parrafo);
    parrafo.innerHTML =
      "<p style='color:#F5E644'>Nombre debe estar completo</p>";
    validacion = false;
  }

  if (!ValidaEmail(mail)) {
    let contenido_email_registro = document.getElementById("email_registro");
    let mensaje = document.createElement("p");
    contenido_email_registro.appendChild(mensaje);
    mensaje.innerHTML =
      "<p style='color:#F5E644'>Correo no válido " +
      mail +
      " debe contener un @</p>";
    validacion = false;
  }

  if (ValidarPassword(password)) {
    if (password != confirmPassword) {
      let contenido_password_registro = document.getElementById(
        "contrasena_registro"
      );
      let mensaje = document.createElement("p");
      contenido_password_registro.appendChild(mensaje);
      mensaje.innerHTML =
        "<p style='color:#F5E644'>Las contraseñas no coinciden";
      validacion = false;
    }
  } else {
    let contenido_password_registro = document.getElementById(
      "contrasena_registro"
    );
    let mensaje = document.createElement("p");
    contenido_password_registro.appendChild(mensaje);
    mensaje.innerHTML = "<p style='color:#F5E644'>contraseña no valida";
    validacion = false;
  }

  if (validacion == true) {
   
   
 
   location.href="registro_validacion";
    return true; 
  }

  return false; // Detener el envío del formulario si hay errores de validación
}


/* ---- VALIDACION LOGIN ---- */
function validar_login() {
  var mail = document.getElementById("mail").value;
  var password = document.getElementById("contrasena").value;

 

  if (!ValidaEmail(mail)) {
    let contenido_email = document.getElementById("email_login");
    let parrafo = document.createElement("p");
    contenido_email.appendChild(parrafo);
    parrafo.innerHTML =
      "<p style='color:#F5E644'>Usuario no válido " +
      mail +
      " debe contener un @</p>";
    return false;
  }

  if (!ValidarPassword(password)) {
    let contenido_pass = document.getElementById("pass_login");
    let mensaje = document.createElement("p");
    contenido_pass.appendChild(mensaje);
    mensaje.innerHTML = "<p style='color:#F5E644'>La contraseña ingresada no es válida. Por favor, verifica tu contraseña y asegúrate de que esté escrita correctamente</p>";
    
      return false;
  }

  setTimeout(function () {
    location.reload();
  }, 5000);

  if (ValidaEmail(mail) && ValidarPassword(password)) {
    location.href = "login_validacion.php";
    return true;
  }
}



/* ---- VALIDACION FORMULARIO DE CONTACTO ---- */
function validar_formulario_contacto() {
  let validacion = true;

  // Obtener valores
  let nombre = document.getElementById("nombre").value;
  let apellido = document.getElementById("apellido").value;
  let mail = document.getElementById("mail").value;
  let telefono = document.getElementById("telefono").value;
  let direccion1 = document.getElementById("direccion1").value;
  let ciudad = document.getElementById("ciudad").value;
  let estado = document.getElementById("estado").value;
  let codigo_postal = document.getElementById("codigoPostal").value;
  let pais = document.getElementById("selectorPais").value;
  let anio = document.getElementById("anio_nacimiento").value;

  // Validaciones requeridos
  // Nombre
  let contenido_nombre = document.getElementById("div-nombre");
  let errorNombre = contenido_nombre.getElementsByTagName("p");
  if (nombre == "") {
    validacion = false;
    if (errorNombre.length == 0) {
      let parrafo = document.createElement("p");
      parrafo.style.color = "red";
      parrafo.textContent = "Nombre es requerido";
      contenido_nombre.appendChild(parrafo);
    }
  } else {
    if (errorNombre.length > 0) {
      contenido_nombre.removeChild(errorNombre[0]);
    }
  }

  // apellido
  let contenido_apellido = document.getElementById("div-apellido");
  let errorApellido = contenido_apellido.getElementsByTagName("p");
  if (apellido == "") {
    validacion = false;
    if (errorApellido.length == 0) {
      let parrafo = document.createElement("p");
      parrafo.style.color = "red";
      parrafo.textContent = "Apellido es requerido";
      contenido_apellido.appendChild(parrafo);
    }
  } else {
    if (errorApellido.length > 0) {
      contenido_apellido.removeChild(errorApellido[0]);
    }
  }

  //mail
  let contenido_mail = document.getElementById("div-mail");
  let errorMail = contenido_mail.getElementsByTagName("p");
  if (mail == "") {
    validacion = false;
    if (errorMail.length == 0) {
      let parrafo = document.createElement("p");
      parrafo.style.color = "red";
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
      parrafo.style.color = "red";
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
      parrafo.style.color = "red";
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
      parrafo.style.color = "red";
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
      parrafo.style.color = "red";
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
      parrafo.style.color = "red";
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
      parrafo.style.color = "red";
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
      parrafo.style.color = "red";
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
      "<p style='color:red'>Correo no válido " +
      mail +
      " formato no correcto</p>";
    validacion = false;
  }

  return validacion;
}
