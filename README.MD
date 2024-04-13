Git Comandos:

1- Apenas entramos deberemos hacer un PULL sobre el main para actualizar cambios.
2- Luego "situados en nuestra rama" hacemos un "git merge main" y se actualiza nuestra rama a los cambios del main.

# proyecto-final-DAW-grupo14

# php-mysql-proyecto-base
Estructura base para un proyecto PHP + MySQL + Bootstrap con contenedores Docker

## Dependencias necesarias
1. Docker y Compose (https://www.docker.com/products/docker-desktop/)
2. Visual Studio Code (https://code.visualstudio.com/Download)
3. Usuario en Github (https://github.com/signup)

## Dependencias recomendadas
1. Para gestionar la base de datos desde el mismo VSCode, instalar las extensiones "SQLTools" y "SQLTools MySQL"
(He incluído en el proyecto la configuración para que no tengáis que hacer nada más que instalar estas dos extensiones)

## Cómo iniciar los servicios (Apache + PHP + MySQL)
- En el directorio raíz ejecuta el comando "docker-compose up --build -d" para ejecutar e instalar todas las dependencias necesarias (la primera vez tardará más)

## Cómo detener los servicios (Es importante hacerlo al terminar de trabajar)
- En el directorio raíz ejecuta el comando "docker-compose down"

## URL
- Web: http://localhost:8111/
- Base de datos MySQL: localhost:3306/test_database
- Credenciales MySQL: Ver archivo docker-compose.yml

## Usuarios pregenerados
#### Admin
Email: admin@seyfert.com
Constraseña: Admin123
#### Usuario
Email: usuario@seyfert.com
Constraseña: Usuario123

## Arquitectura de la aplicación
Para evitar el spaghetti code hemos decidido organizar el código de la aplicación siguiendo una arquitectura que nos permita agregar funcionalidades y modificar las existentes del proyecto de una forma ordenada, evitando duplicidades y la aparación de errores dificiles de resolver.
Este diseño además mantiene una separación de resposabilidades, de tal forma que la lógica de cada funcionalidad está separada de las otras y la visualización de la lógica.
Esto se hace para cumplir lo mejor posible con el principio de responsabilidad única.

### Estructura del proyecto
1. Todos los archivos de PHP están en el directorio www
2. La estructura de base de datos inicial, con sus DDL y SQL están en /docker/mysql/init-db.sql
3. El archivo js de Bootstrap se encuentra en el directorio /www/js y el de css en el directorio /www/css que se incluyen en las páginas web.

### Capa de controladores
Capa de abstracción de alto nivel desde donde se accede a las operaciones de cada modelo. En esa primera versión www/controladores/usuarios.php es el único controlador disponible, pero en un futuro agregaremos más.

### Consultas a la base de datos
Las operaciones de bajo nivel en la base de datos se realizan en esta capa, desde el fichero www/utiles/bdd.php

### Uso de HASH en lugar de contraseñas en texto plano
Para evitar la mala práctica de guardar contraseñas en texto plano, cuando el usuario ingresa su contraseña en el sistema, tanto en el login como en el alta, aplicamos un hash criptográfico seguro para la misma, que guardamos en lugar de la contraseña original.
Por ese motivo, a la hora de editar un usuario, no mostramos la contraseña original, pero si permitimos modificarla o dejarla como estaba.

### Visualización
Nuevamente para mantener una división de responsabilidades, los formularios, htmls y vistas en general se encuentran lo más separadas posibles del código lógico, dentro de /www/vistas/

### Enrutador
Para gestionar todos los mensajes enviados por los formularios se sigue el patrón de diseño dispatcher (enrutador en castellano). Esto se hace utilizando un único de punto de destino para todos los actions de los formularios, enrutador.php, donde se utilizan los diferentes campos enviados en el formulario (ya sean parámetros POST y/o GET)  como señales que indican la acción a realizar y que parte del código atenderá cada llamada.
Esto facilita la modularidad, dado que es muy sencillo agregar funcionalidades nuevas (será un bloque de código nuevo con otra señal) y al mismo tiempo permite controlar fácilmente los permisos requeridos para cada tipo de acciones, ya sean de usuario administrador o usuario normal.