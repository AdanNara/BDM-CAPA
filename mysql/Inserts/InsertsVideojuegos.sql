/*
	idVideojuego int primary key auto_increment,
    nombre varchar(100) not null COMMENT 'Nombre completo del titulo del videojuego',
    caratula text not null COMMENT 'URL a la imagen del videojuego'
*/

use db_videopost;
SELECT * FROM videojuegos;

#INSERTAR DATOS
INSERT INTO videojuegos (nombre, caratula)
VALUES ('Marvel Rivals', 'https://static-cdn.jtvnw.net/ttv-boxart/1264310518_IGDB-285x380.jpg' ),
('Minecraft','https://static-cdn.jtvnw.net/ttv-boxart/27471_IGDB-285x380.jpg'),
('Elden Ring', 'https://static-cdn.jtvnw.net/ttv-boxart/512953_IGDB-285x380.jpg'),
('Counter Strike 2','https://static-cdn.jtvnw.net/ttv-boxart/32399-285x380.jpg'),
('Red Dead Redemption 2','https://static-cdn.jtvnw.net/ttv-boxart/493959_IGDB-285x380.jpg'),
('Resident Evil 4','https://static-cdn.jtvnw.net/ttv-boxart/322503446_IGDB-285x380.jpg');
