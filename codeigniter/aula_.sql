CREATE TABLE IF NOT EXISTS estados (
  idEstado INTEGER PRIMARY KEY NOT NULL AUTO_INCREMENT,
  uf varchar(2) NOT NULL,
  nomeEstado varchar(150) NOT NULL
);

CREATE TABLE IF NOT EXISTS usuarios (
  idUsuario INTEGER PRIMARY KEY NOT NULL AUTO_INCREMENT,
  usuario varchar(150) NOT NULL,
  senha varchar(150) NOT NULL,
  status INTEGER,
  saldo INTEGER
);

CREATE TABLE IF NOT EXISTS cadastro (
  id bigint(20) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  nome varchar(150) NOT NULL,
  documento varchar(18) NOT NULL,
  endereco varchar(255) NOT NULL,
  numero smallint(6) DEFAULT NULL,
  cidade varchar(100) NOT NULL,
  uf INTEGER,
  pais varchar(100) NOT NULL,
  fone varchar(20) NOT NULL,
  email varchar(150) NOT NULL,
  data_nasc date NOT NULL,
  FOREIGN KEY(uf) REFERENCES estados (idEstado)
);
