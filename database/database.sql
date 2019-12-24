CREATE DATABASE tienda_master;  /* Creando la base de datos */
use tienda_master; /* Usando la base de datos */

/*
Creando la tabla de usuarios
*/
CREATE TABLE usuarios (
id INT (255) auto_increment NOT NULL, /* Campo tipo Entero, maximo 255 caracteres, auto incrementable. no puede ser nulo. */
nombre VARCHAR (100) NOT NULL, /* Campo tipo Varios caracteres, maximo 100 caracteres, no puede ser nulo. */
apellidos VARCHAR (255), /* Campo tipo Varios caracteres, maximo 255 caracteres, si puede ser nulo. */
email VARCHAR (255) NOT NULL,
password VARCHAR (255) NOT NULL,
rol VARCHAR (20),
imagen VARCHAR (255),
CONSTRAINT pk_usuarios PRIMARY KEY (id), /* Restriccion nombrada pk_usuarios para que el id sea la clave primaria de la tabla. */
CONSTRAINT uq_email UNIQUE (email) /* Restriccion nombrada uq_email para que los e-mail sean unicos. */
) ENGINE = InnoDB; /* Motor de la tabla. */

/*
Creando tabla de Categorias
*/
CREATE TABLE categorias (
id INT (255) auto_increment NOT NULL,
nombre VARCHAR (100) NOT NULL,
CONSTRAINT pk_categoria PRIMARY KEY (id)
) ENGINE = InnoDB;

/*
Creando tabla de Pedidos
*/
CREATE TABLE pedidos (
id INT (255) auto_increment NOT NULL,
usuario_id INT (255) NOT NULL,
estado VARCHAR (100) NOT NULL,
ciudad VARCHAR (100) NOT NULL,
direccion VARCHAR (255) NOT NULL,
costo FLOAT (200, 2) NOT NULL,  /* Campo tipo Flotante (numero con decimales), maximo de 200 caracteres tipo entero y 2 caracteres tipo decimal. */
status VARCHAR (50) NOT NULL,
fecha DATE NOT NULL,  /* Campo tipo Fecha, no puede ser nula. */
hora TIME NOT NULL, /* Campo tipo Tiempo, no puede ser nulo. */
CONSTRAINT pk_pedidos PRIMARY KEY (id),
CONSTRAINT fk_pedidos_usuario FOREIGN KEY (usuario_id) REFERENCES usuarios(id) /* Restriccion nombrada fk_pedidos_usuario para que usuarios_id sea clave foranea con respecto al id de usuarios. */
) ENGINE = InnoDB;

/*
Creando tabla de productos
*/
CREATE TABLE productos (
id INT (255) auto_increment NOT NULL,
categoria_id INT (255) NOT NULL,
nombre VARCHAR (100) NOT NULL,
descripcion TEXT,
precio FLOAT (100, 2) NOT NULL,
stock INT (255) NOT NULL,
oferta VARCHAR (2),
fecha DATE NOT NULL,
imagen VARCHAR (255),
CONSTRAINT pk_productos PRIMARY KEY (id),
CONSTRAINT fk_producto_categoria FOREIGN KEY (categoria_id) REFERENCES categorias(id)
) ENGINE = InnoDB;

/*
Creando tabla de linea de pedidos
*/
CREATE TABLE lineas_pedidos (
id INT (255) auto_increment NOT NULL,
pedido_id INT (255) NOT NULL,
producto_id INT (255) NOT NULL,
unidades INT (255) NOT NULL,
CONSTRAINT pk_lineas_pedidos PRIMARY KEY (id),
CONSTRAINT fk_linea_pedido FOREIGN KEY (pedido_id) REFERENCES pedidos(id),
CONSTRAINT fk_linea_producto FOREIGN KEY (producto_id) REFERENCES productos(id)
) ENGINE = InnoDB;
