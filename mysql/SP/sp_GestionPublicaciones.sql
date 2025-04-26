/*
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
*/

#SP PARA GESTION DE PUBLICACIONES
DELIMITER &&
CREATE PROCEDURE sp_GestionPublicaciones(
	accion tinyint,
    pid int,
    ptitulo varchar(50),
    pdescripcion text,
    pfoto mediumblob,
    pvideo varchar(255),
    pusuario varchar(20),
    pvideojuego int
)
BEGIN
	#1 AGREGAR PUBLICACION CON FOTO 
	IF accion = 1 THEN
		INSERT INTO publicaciones (titulo, descripcion, foto, video, usuario, videojuego)
        VALUES (ptitulo, pdescripcion, pfoto, null, pusuario, pvideojuego);

	END IF;
    
	#2 AGREGAR PUBLICACION CON VIDEO 
	IF accion = 2 THEN
		INSERT INTO publicaciones (titulo, descripcion, foto, video, usuario, videojuego)
        VALUES (ptitulo, pdescripcion, null, pvideo, pusuario, pvideojuego);
	END IF;
    
    #3 MOSTRAR PUBLICACIONES 
    IF accion = 3 THEN
		SELECT 
		p.idPublicacion as ID,
		p.titulo as Titulo,
		p.descripcion as Descr,
		p.video as Video,
		p.calificacion as Calif,
		j.nombre as Videojuego,
		u.username as Usuario
		FROM publicaciones as p
		JOIN videojuegos as j
			ON p.videojuego = j.idVideojuego
		JOIN usuarios as u
			ON p.usuario = u.username;
	END IF;
    
    #4 MOSTRAR LA IMAGEN DE CADA PUBLICACION
    IF accion = 4 THEN
			SELECT foto 
            FROM publicaciones
            WHERE idPublicacion = pid;
    END IF;
    
	#5 MOSTRAR PUBLICACIONES CON FILTRO DE CATEGORIA
    IF accion = 5 THEN
		SELECT 
		p.idPublicacion as ID,
		p.titulo as Titulo,
		p.descripcion as Descr,
		p.video as Video,
		p.calificacion as Calif,
		j.nombre as Videojuego,
		u.username as Usuario
		FROM publicaciones as p
			JOIN videojuegos as j
				ON p.videojuego = j.idVideojuego
			JOIN usuarios as u
				ON p.usuario = u.username
		WHERE p.videojuego = pvideojuego;
	END IF;
        
END &&
DELIMITER ;

SELECT * FROM publicaciones;
SELECT * FROM videojuegos;
use db_videopost;


CALL sp_GestionPublicaciones(3, null , null, null, null, null, null, null); #EJECUTA SIN FILTRO PARA INICIO
CALL sp_GestionPublicaciones(5, null , null, null, null, null, null, 2); #EJECUTA CON FILTRO PARA DESCUBRIR

SHOW CREATE PROCEDURE sp_GestionPublicaciones;
DROP PROCEDURE sp_GestionPublicaciones;
