create database db_videopost;

use db_videopost;

create table usuarios(
	username varchar(20) primary key COMMENT 'Identificador unico del usuario',
	nombre varchar(50) not null COMMENT 'Nombre completo del usuario',
	correoE varchar(100) not null unique COMMENT 'Email del usuario, irrepetible',
	contrasena varchar(255) not null ,
	discordUser varchar(40) COMMENT 'Perfil del usuario en la plataforma Discord',
	tipoUsuario tinyint default 0 COMMENT 'tipo de usuario: 0 - normal, 1 - administrador',
	fotoPerfil mediumblob 
);


create table videojuegos(
	idVideojuego int primary key auto_increment,
    nombre varchar(100) not null COMMENT 'Nombre completo del titulo del videojuego',
    caratula text not null COMMENT 'URL a la imagen del videojuego'
);

create table publicaciones(
	idPublicacion int primary key auto_increment,
    titulo varchar(50) not null COMMENT 'Titulo de la publicacion obligatoria',
    descripcion text COMMENT 'Texto donde el usuario explica su publicacion, opcional',
    foto mediumblob COMMENT 'Foto que acompaña la publicacion, opcional (foto o video solo 1)',
    video varchar(255) COMMENT 'Path del video que acompaña la publicacion, opcional (foto o video solo 1)',
    upvote int default 0 COMMENT  'Votos positivos que tiene la publicacion',
    downvote int default 0 COMMENT 'Votos negativos que tiene la publicacion',
    calificacion int default 0 COMMENT 'Calificacion calculada restando el valor downvote a upvote',
    fechahora datetime default now() COMMENT 'Fecha y hora cuando se realizo la publicacion',
    usuario varchar(20) not null COMMENT 'Llave foranea a usuarios',
    videojuego int COMMENT 'Llave foranea a videojuegos',
    
    foreign key (usuario) references usuarios(username),
    foreign key (videojuego) references videojuegos(idVideojuego)
); 

create table reportes(
	idReporte int primary key auto_increment,
    tipo varchar(50) not null COMMENT 'De que trata el reporte, queja, sugerencia, reporte de bug',
    descripcion text not null COMMENT 'Explicacion del usuario sobre su reporte',
	fechahora datetime default now() COMMENT 'Fecha y hora cuando se realizo el reporte',
    estado int default 0 COMMENT 'Estado actual del reporte: 0=Pendiente, 1=Revisado',
	usuario varchar(20) not null COMMENT 'Llave foranea a usuarios',

    foreign key (usuario) references usuarios(username)
);

create table mensajes(
	idMensaje int primary key auto_increment,
    remitente varchar(20) not null COMMENT 'FK de Usuario que envia el mensaje',
	destinatario varchar(20) not null COMMENT 'FK de Usuario que recibe el mensaje',
	mensaje text not null ,
	fechahora datetime default now() COMMENT 'Fecha y hora en la que se envio el mensaje',
    
    foreign key (remitente) references usuarios(username),
	foreign key (destinatario) references usuarios(username)
);


select * from usuarios;
truncate table usuarios;
drop table usuarios;
desc usuarios;

select * from publicaciones;
truncate table publicaciones;
drop table publicaciones;
desc publicaciones;

select * from reportes;
truncate table reportes;
drop table reportes;

select * from videojuegos;
truncate table videojuegos;
drop table videojuegos;

select * from mensajes;
truncate table mensajes;
drop table mensajes;

update usuarios 
set fotoPerfil = null
where username = 'jorgepablo23';



#	usuario123 = 'Contrasena1'
#	usuariodeprueba = 'Pruebita123'


