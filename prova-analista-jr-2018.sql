-- Database: alexandre

-- DROP DATABASE alexandre;

CREATE DATABASE alexandre
  WITH OWNER = postgres
       ENCODING = 'UTF8'
       TABLESPACE = pg_default
       LC_COLLATE = 'pt_BR.UTF-8'
       LC_CTYPE = 'pt_BR.UTF-8'
       CONNECTION LIMIT = -1;

create table estado (codigo serial not null, sigla varchar(2) not null, nome varchar(255) not null,
primary key(codigo));

create table cidade (codigo serial not null, codigo_estado int not null, nome varchar(255) not null,
primary key(codigo), foreign key(codigo_estado) references estado(codigo));

create table usuario (email varchar(255) not null unique, senha varchar(255) not null, nome varchar(255) not null, telefone varchar(20) not null,
logradouro varchar(255) not null, numero int not null, complemento varchar(255), bairro varchar(255) not null,
codigo_cidade int not null, cep varchar(9) not null, primary key(email), foreign key(codigo_cidade) references 
cidade(codigo));

--Inserts na tabela estado
insert into estado (sigla, nome) values ('RJ', 'Rio de janeiro');
insert into estado (sigla, nome) values ('SP', 'São Paulo');
insert into estado (sigla, nome) values ('MG', 'Minas Gerais');
insert into estado (sigla, nome) values ('ES', 'Espirito Santo');

--Inserts na tabela cidade

insert into cidade (codigo_estado, nome) values (1, 'Campos');
insert into cidade (codigo_estado, nome) values(1,'Cabo Frio');
insert into cidade (codigo_estado, nome) values(3, 'Belo Horizonte');
insert into cidade (codigo_estado, nome) values(2, 'Campinas');
insert into cidade (codigo_estado, nome) values(2,'Campos do Jordao');
insert into cidade (codigo_estado, nome) values(4, 'Guarapari');
insert into cidade (codigo_estado, nome) values(4,'Vila Velha');









