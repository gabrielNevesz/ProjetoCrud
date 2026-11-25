create database dbprojeto;
use dbprojeto;

create table tbprojeto(
codi_p int auto_increment primary key,
nome_p varchar(40) not null,
emai_p varchar(40) not null,
senh_p varchar(8) not null,
sexo_p varchar(1),
dtna_p date
)

select * from tbprojeto;
describe tbprojeto;