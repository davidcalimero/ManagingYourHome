drop table utilizador cascade;
drop table divisao cascade;
drop table equipamento cascade;
drop table equipada cascade;
drop table acede cascade;
drop table utiliza cascade;

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