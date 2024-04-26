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

  setTimeout(function () {
    location.reload();
  }, 7000);

  if (validacion == true) {
    // si la validacion es correcta redirecciona a enrutador.php para validacion php//
    alert("En construccion");
  }
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
  }

  if (!ValidarPassword(password)) {
    let contenido_pass = document.getElementById("pass_login");
    let mensaje = document.createElement("p");
    contenido_pass.appendChild(mensaje);
    mensaje.innerHTML =
      "<p style='color:#F5E644'>La contraseña ingresada no es válida. Por favor, verifica tu contraseña y asegúrate de que esté escrita correctamente</p>";
  }

  setTimeout(function () {
    location.reload();
  }, 7000);

  if (ValidaEmail(mail) && ValidarPassword(password)) {
    // si la validacion es correcta redirecciona a validacion_login para validacion php//
    location.href = "validacion_login.php";
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
    if(errorNombre.length == 0){
      let parrafo = document.createElement("p");
      parrafo.style.color = "red";
      parrafo.textContent = "Nombre es requerido";
      contenido_nombre.appendChild(parrafo);
    }
  } else{
    if(errorNombre.length > 0){
      contenido_nombre.removeChild(errorNombre[0]);
    }
  }

  // Nombre
  if (apellido == "") {
    let contenido_apellido = document.getElementById("div-apellido");
    let parrafo = document.createElement("p");
    contenido_apellido.appendChild(parrafo);
    parrafo.innerHTML = "<p style='color:red'>Apellido es requerido</p>";
    validacion = false;
  }
  if (mail == "") {
    let contenido_mail = document.getElementById("div-mail");
    let parrafo = document.createElement("p");
    contenido_mail.appendChild(parrafo);
    parrafo.innerHTML =
      "<p style='color:red'>Correo es requerido</p>";
    validacion = false;
  }
  if (telefono == "") {
    let contenido_telefono = document.getElementById("div-telefono");
    let parrafo = document.createElement("p");
    contenido_telefono.appendChild(parrafo);
    parrafo.innerHTML = "<p style='color:red'>Telefono es requerido</p>";
    validacion = false;
  }
  if (direccion1 == "") {
    let contenido_direccion1 = document.getElementById("div-direccion_1");
    let parrafo = document.createElement("p");
    contenido_direccion1.appendChild(parrafo);
    parrafo.innerHTML = "<p style='color:red'>direccion</p>";
    validacion = false;
  }
  if (ciudad == "") {
    let contenido_ciudad = document.getElementById("div-ciudad");
    let parrafo = document.createElement("p");
    contenido_ciudad.appendChild(parrafo);
    parrafo.innerHTML = "<p style='color:red'>ciudad</p>";
    validacion = false;
  }
  if (estado == "") {
    let contenido_estado = document.getElementById("div-estado");
    let parrafo = document.createElement("p");
    contenido_estado.appendChild(parrafo);
    parrafo.innerHTML = "<p style='color:red'>estado</p>";
    validacion = false;
  }
  if (codigo_postal == "") {
    let contenido_codigo_postal = document.getElementById("div-codigoP");
    let parrafo = document.createElement("p");
    contenido_codigo_postal.appendChild(parrafo);
    parrafo.innerHTML = "<p style='color:red'>Código postal requerido</p>";
    validacion = false;
  }
  if (pais == "") {
    let contenido_pais = document.getElementById("div-pais");
    let parrafo = document.createElement("p");
    contenido_pais.appendChild(parrafo);
    parrafo.innerHTML = "<p style='color:red'>País es requerido</p>";
    validacion = false;
  }
  if (anio == "") {
    let contenido_anio = document.getElementById("div-anio");
    let parrafo = document.createElement("p");
    contenido_anio.appendChild(parrafo);
    parrafo.innerHTML = "<p style='color:red'>Año es requerido</p>";
    validacion = false;
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