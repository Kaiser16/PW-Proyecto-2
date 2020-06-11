drop database if exists codeigniter;

create database codeigniter;

use codeigniter;

CREATE TABLE articulos (
	id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY ,
	titulo VARCHAR( 100 ) NOT NULL ,
	descripcion VARCHAR( 200 ) NOT NULL ,
	cuerpo TEXT NOT NULL
)

CREATE TABLE usuarios (
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	nombre VARCHAR(100) NOT NULL,
	correo VARCHAR(80) NOT NULL,
	usuario VARCHAR(100) NOT NULL,
	pass VARCHAR(100) NOT NULL,
	codigo VARCHAR(50) NOT NULL,
	estado BOOLEAN NOT NULL
)

INSERT INTO usuarios(id,nombre,correo,usuario,pass,codigo,estado) VALUES ('','pepe','pepegmail','pepito19','1234','','1');