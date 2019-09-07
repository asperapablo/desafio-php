CREATE DATABASE mercado;

CREATE TABLE mercado.tipo_produto (
    id serial not null primary key,
    nome varchar(50) not null,
    percentual_imposto int not null
);

CREATE TABLE mercado.produto (
    id serial not null primary key,
    tipo_produto_id int not null references tipo_produto(id),
    valor float not null default 0,
    nome varchar(50) not null
);