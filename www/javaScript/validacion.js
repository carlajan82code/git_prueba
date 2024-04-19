function ValidaEmail(email) {
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
  }  
   

     //  La contraseña debe tener al menos 8 caracteres, incluyendo al menos una letra mayúscula, una letra minúscula y un número.
  function ValidarPassword(contrasena){
    
    var passRegex=/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/;
    if (passRegex.test(contrasena)) {
      return true; // La contraseña es válida.
  } else {
      return false; // La contraseña no cumple con los criterios especificados.
  }
}
  
/* ---- VALIDACION REGISTRO ---- */

function validar_registro(){

let nombre = document.getElementById('nombre').value;
let mail= document.getElementById('mail').value;
let password= document.getElementById('contrasena').value;
let confirmPassword = document.getElementById('conf_contrasena').value;
let validacion = true;

    if (nombre =="")
    {
      let contenido_nombre = document.getElementById("nombre_registro");
      let parrafo = document.createElement('p');
      contenido_nombre.appendChild(parrafo);
      parrafo.innerHTML = "<p style='color:#F5E644'>Nombre debe estar completo</p>";
       validacion = false;
    }

    if (!ValidaEmail(mail)) 
    {
      let contenido_email_registro = document.getElementById("email_registro");
      let mensaje = document.createElement('p');
      contenido_email_registro.appendChild(mensaje);
     mensaje.innerHTML = "<p style='color:#F5E644'>Correo no válido " + mail +" debe contener un @</p>";
     validacion = false;
     
    }

     if (ValidarPassword(password))
     {
        if (password != confirmPassword)
        {
          let contenido_password_registro = document.getElementById("contrasena_registro");
          let mensaje = document.createElement('p');
          contenido_password_registro.appendChild(mensaje);
          mensaje.innerHTML= "<p style='color:#F5E644'>Las contraseñas no coinciden";
          validacion = false;
      }
   
     }
     else{
      let contenido_password_registro = document.getElementById("contrasena_registro");
      let mensaje = document.createElement('p');
      contenido_password_registro.appendChild(mensaje);
      mensaje.innerHTML= "<p style='color:#F5E644'>contraseña no valida";
      validacion = false;
     }

     setTimeout(function(){
      location.reload();
     }, 7000);
    
       if (validacion == true)
       {
        // si la validacion es correcta redirecciona a enrutador.php para validacion php//
       alert("En construccion"); 

       }
  }


/* ---- VALIDACION LOGIN ---- */

  function validar_login(){

 var  mail= document.getElementById('mail').value;
 var password= document.getElementById('contrasena').value;

 if (!ValidaEmail(mail) ) {

  let contenido_email = document.getElementById("email_login");
  let parrafo = document.createElement('p');
  contenido_email.appendChild(parrafo);
  parrafo.innerHTML = "<p style='color:#F5E644'>Usuario no válido " + mail +" debe contener un @</p>";

  }

 if(!ValidarPassword(password)){
 let contenido_pass =document.getElementById("pass_login");
 let mensaje = document.createElement('p');
 contenido_pass.appendChild(mensaje);
 mensaje.innerHTML= "<p style='color:#F5E644'>La contraseña ingresada no es válida. Por favor, verifica tu contraseña y asegúrate de que esté escrita correctamente</p>";
   

  }

  setTimeout(function(){
    location.reload();
}, 7000);

if ( (ValidaEmail(mail))&& (ValidarPassword(password)))
{  // si la validacion es correcta redirecciona a validacion_login para validacion php//
  location.href="validacion_login.php";
  
}

 }
