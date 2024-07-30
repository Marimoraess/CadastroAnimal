-- Deleta o banco de dados com mesmo nome
drop database if exists CadVet;
-- Cria o banco de dados se não existir
create database if not exists CadVet;

use CadVet;

create table if not exists Cidade(
	id					int auto_increment,
    nome_cidade			varchar(50),
    estado				varchar(2),
    primary key(id)
);

create table if not exists Pessoa (
	id					int auto_increment,
    nome				varchar(50) not null,
    email				varchar(50) not null,
    endereco			varchar(100) not null,
    bairro				varchar(100) not null,
    id_cidade			int,
    cep					varchar(10) not null,
    primary key(id),
    constraint FK_CidadePessoa
		foreign key(id_cidade) references Cidade(id)
);

create table if not exists Animal (
	id					int auto_increment,
    nome				varchar(50) not null,
    especie				varchar(50) not null,
    raca				varchar(50) not null,
    data_nascimento		date not null,
    idade				int not null,
    castrado 			bool,
    id_pessoa			int,
    primary key(id),
    constraint FK_PessoaAnimal 
        foreign key(id_pessoa) references Pessoa(id)
);