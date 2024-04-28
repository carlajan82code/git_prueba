-- Aca pueden agregar todas las tablas y cosas que vean que hacen falta para la base de datos.
-- IMPORTANTE. NO es necesario que hagan CREATE DATABASE (la base de datos se crea directamente con las instrucciones del archivo docker-compose.yml con el nombre: proyecto_grupo14)

CREATE TABLE usuario(id_usuario int primary key auto_increment, 
nombre varchar(255), mail varchar(255), pass varchar(255), tipo int);
INSERT INTO usuario(nombre, mail, pass, tipo) 
VALUES ('Admin', 'admin@seyfert.com', '4d0b24ccade22df6d154778cd66baf04288aae26df97a961f3ea3dd616fbe06dcebecc9bbe4ce93c8e12dca21e5935c08b0954534892c568b8c12b92f26a2448', 0);
INSERT INTO usuario(nombre, mail, pass, tipo) 
VALUES ('Usuario', 'usuario@seyfert.com', '14a829ab43fef85e40e115f6aea369ee89146aeddc9b8a187fa1cbdf99ebf4e8e22d56b6472f24b96878a87b87326ddd23db28a99f5ef3235a817597e58071a0', 1);

CREATE TABLE paquete(id_paquete int auto_increment primary key, nombre_paquete varchar(255), precio int, descripcion varchar (500));
INSERT INTO paquete(nombre_paquete, precio, descripcion)
VALUES ('Fin de semana en la luna', 40000, 'Fin de semana en la luna con desayuno incluido y excursión al crater Seyfert');
INSERT INTO paquete(nombre_paquete, precio, descripcion)
VALUES ('Vuelta a la orbita lunar', 10000, 'Sumergete en un viaje alrededor de la orbita lunar para conocer todos sus crateres. Durante todo el trayecto tendrá incluido la comida y bebida');
INSERT INTO paquete(nombre_paquete, precio, descripcion)
VALUES ('Semana de relax', 90000, 'Escapate una semana a la luna todo incluido, disfruta de exursiones, shows y mucho más');

CREATE TABLE reserva( id_reserva int auto_increment primary key, usuario int, fecha date, paquete int, foreign key (usuario) references usuario(id_usuario), foreign key (paquete) references paquete(id_paquete)); 