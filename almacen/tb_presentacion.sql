CREATE TABLE tb_presentacion (
  id_presentacion                        INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  nombre_pre          VARCHAR (256) NULL,  
  extra1              VARCHAR (256) NULL,
  extra2              VARCHAR (256) NULL,
  extra3              VARCHAR (256) NULL,
  user_creacion       VARCHAR (256) NULL,
  user_actualizacion  VARCHAR (256) NULL,
  user_eliminacion    VARCHAR (256) NULL,
  fyh_creacion        DATETIME NULL,
  fyh_actualizacion   DATETIME NULL,
  fyh_eliminacion     DATETIME NULL,
  estado              VARCHAR (11) NULL
);