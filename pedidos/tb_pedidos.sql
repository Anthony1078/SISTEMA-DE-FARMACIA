CREATE TABLE tb_pedidos (
id                     INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
id_medicamento_p       VARCHAR (512) NULL, 
cantidad_p             VARCHAR (512) NULL,
fecha_pedido           VARCHAR (512) NULL,
extra1                 VARCHAR (512) NULL,
extra2                 VARCHAR (512) NULL,
extra3                 VARCHAR (512) NULL,
user_creacion          VARCHAR (512) NULL,
user_actualizacion     VARCHAR (512) NULL,
user_eliminacion       VARCHAR (512) NULL,
fyh_creacion           DATETIME  NULL,
fyh_actualizacion      DATETIME  NULL,
fyh_eliminacion        DATETIME  NULL,
estado                 VARCHAR (11) NULL
);