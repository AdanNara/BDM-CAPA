CREATE VIEW vw_Publicaciones AS 
SELECT 
	p.idPublicacion as ID,
	p.titulo as Titulo,
	p.descripcion as Descr,
	p.video as Video,
	p.calificacion as Calif,
	j.idVideojuego as IdVideojuego,
	j.nombre as Videojuego,
	u.username as Usuario,
	u.tipoUsuario as TipoUsuario
FROM publicaciones as p
JOIN videojuegos as j
	ON p.videojuego = j.idVideojuego
JOIN usuarios as u
	ON p.usuario = u.username
ORDER BY p.fechahora desc;

SELECT * FROM vw_Publicaciones;