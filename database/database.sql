CREATE DATABASE tienda_master;
use tienda_master;

CREATE TABLE usuarios
(
    id
        nombre
    apellidos
email
password
rol
imagen
) ENGINE = InnoDB;

    CREATE TABLE categorias
    (
        id
            nombre
    )
    ENGINE = InnoDB;

    CREATE TABLE pedidos
    (
        id
            usuario_id
        estado
ciudad
direccion
costo
estado
fecha
hora
) ENGINE = InnoDB;

        CREATE TABLE productos
        (
            id
                categoria_id
            nombre
descripcion
precio
stock
oferta
fecha
imagen
) ENGINE = InnoDB;

            CREATE TABLE linea_pedido
            (
                id
                    pedido_id
                producto_id
unidades
) ENGINE = InnoDB;