drop table if exists utilizador cascade;
drop table if exists divisao cascade;
drop table if exists equipamento cascade;
drop table if exists equipada cascade;
drop table if exists acede cascade;
drop table if exists utiliza cascade;
drop table if exists login cascade;

create table utilizador (
	uID varchar(20) not null unique,
	uNome varchar(20) not null,
	palavraPasse varchar(20) not null,
	constraint utilizadorkey primary key (uID)
);


create table divisao (
	dID varchar(20) not null unique,
	dNome varchar(20) not null,
	dIcon varchar(50) not null,
	constraint divisaokey primary key (dID)
);


create table equipamento (
	eID varchar(20) not null unique,
	eNome varchar(20) not null,
	v1 integer not null,
	v2 integer not null,
	constraint equipamentokey primary key (eID)
);



create table equipada (
	dID varchar(20) not null,
	eID varchar(20) not null,
	constraint equipadakey primary key (dID, eID),
	foreign key (dID) references divisao,
	foreign key (eID) references equipamento
);


create table acede (
	uID varchar(20) not null,
	dID varchar(20) not null,
	constraint acedekey primary key (uID, dID),
	foreign key (uID) references utilizador,
	foreign key (dID) references divisao
);


create table utiliza (
	uID varchar(20) not null,
	eID varchar(20) not null,
	constraint utilizakey primary key (uID, eID),
	foreign key (uID) references utilizador,
	foreign key (eID) references equipamento
);


create table login (
	uID varchar(20) not null,
	constraint loginkey primary key (uID),
	foreign key (uID) references utilizador
);