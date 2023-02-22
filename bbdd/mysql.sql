CREATE DATABASE blog;
SET NAMES UTF8;
CREATE DATABASE IF NOT EXISTS blog;
USE blog;

DROP TABLE IF EXISTS usuarios;
CREATE TABLE usuarios(
  id            int(255) auto_increment not null,
  nombre        varchar(100) not null,
  usuario       varchar(100) not null,
  email         varchar(255) not null,
  password      varchar(255) not null,
  rol           int(50) not null,
  fecha         date ,
  CONSTRAINT pk_usuarios PRIMARY KEY(id)
);


DROP TABLE IF EXISTS categorias;
CREATE TABLE categorias(
  id            int(255) auto_increment not null,
  nombre        varchar(100),
  CONSTRAINT pk_categorias PRIMARY KEY(id)
);



DROP TABLE IF EXISTS entradas;
CREATE TABLE entradas(
  id            int(255) auto_increment not null,
  usuario_id    int(255) not null,
  categoria_id  int(255) not null,
  titulo        varchar(255) not null,
  descripcion   varchar(255),
  fecha         date,
  CONSTRAINT pk_entradas PRIMARY KEY(id),
  CONSTRAINT fk_entrada_usuario FOREIGN KEY(usuario_id) REFERENCES usuarios(id),
  CONSTRAINT fk_entrada_categoria FOREIGN KEY(categoria_id) REFERENCES categorias(id)
);
