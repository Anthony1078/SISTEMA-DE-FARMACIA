CREATE TABLE tb_usuarios (
id                     INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
nombres                VARCHAR (512) NULL, 
ap_paterno             VARCHAR (512) NULL,
ap_materno             VARCHAR (512) NULL,
ci                     VARCHAR (512) NULL,
fecha_nacimiento       VARCHAR (512) NULL,
genero                 VARCHAR (512) NULL,
pais                   VARCHAR (512) NULL,
celular                VARCHAR (512) NULL,
codigo_postal          VARCHAR (512) NULL,
foto_perfil            TEXT NULL,
email                  VARCHAR (512) NULL,
password               VARCHAR (512) NULL,
token                  VARCHAR (512) NULL,
cargo                  VARCHAR (512) NULL,
extra1                 VARCHAR (512) NULL,
extra2                 VARCHAR (512) NULL,
extra3                 VARCHAR (512) NULL,
user_creacion          VARCHAR (512) NULL,
user_actualizacion     VARCHAR (512) NULL,
user_eliminacion       VARCHAR (512) NULL,
fyh_creacion           DATETIME  NULL,
fyh_actualizacion      DATETIME  NULL,
fyh_eliminacion        DATETIME  NULL,
estado                 VARCHAR (255) NULL
);
INSERT INTO `tb_usuarios` (`id`, `nombre`, `ap_paterno`, `ap_materno`, `ci`, `fecha_nacimiento`, `pais`, `celular`, `codigo_postal`, `foto_perfil`, `email`, `password`, `token`, `cargo`, `extra1`, `extra2`, `extra3`, `user_creacion`, `user_actualizacion`, `user_eliminacion`, `fyh_creacion`, `fyh_actualizacion`, `fyh_eliminacion`, `estado`) VALUES (NULL, 'Wilder Anthony', 'Guizado', 'Romero', '74931915', '05/08/03', 'PERÚ', '981038559', '51', 'Yo01.jpg', 'anthony_10_58@outlook.com', '123', NULL, 'ADMINISTRADOR', NULL, NULL, NULL, 'anthony_10_58@outlook.com', NULL, NULL, '2020-08-12 22:28:00', NULL, NULL, '1');