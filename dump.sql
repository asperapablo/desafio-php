CREATE DATABASE mercado;

\c mercado;

CREATE TABLE tipo_produto (
    id serial not null primary key,
    nome varchar(50) not null,
    percentual_imposto int not null
);

CREATE TABLE produto (
    id serial not null primary key,
    tipo_produto_id int not null references tipo_produto(id),
    valor float not null default 0,
    nome varchar(50) not null
);