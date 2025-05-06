#SP PARA GESTION DE CONSULTAS

DELIMITER &&
CREATE PROCEDURE sp_GestionConsultas(
	accion tinyint
)
BEGIN
	#OBTENER PARA LA CANTIDAD DE PUBLICACIONES POR VIDEOJUEGO
	IF accion = 1 THEN
		SELECT 
        CAST(v.idVideojuego AS CHAR) AS ID,
		v.nombre AS Nombre,
		COUNT(p.idPublicacion) AS NumeroPublicaciones
		FROM videojuegos AS v
		LEFT JOIN publicaciones AS p
		ON v.idVideojuego = p.videojuego
		GROUP BY v.idVideojuego
		ORDER BY NumeroPublicaciones DESC; 
    
	END IF;
    #OBTENER LA CANTIDAD DE PUBLICACIONES POR USUARIO
    IF accion = 2 THEN 
		SELECT
        u.username AS ID,
		u.nombre AS Nombre,
		COUNT(p.idPublicacion) AS NumeroPublicaciones
		FROM usuarios AS u
		LEFT JOIN publicaciones AS p
		ON u.username = p.usuario
		GROUP BY u.username
		ORDER BY NumeroPublicaciones DESC;
	END IF;
END && 
DELIMITER ; 

DROP PROCEDURE sp_GestionConsultas;
CALL sp_GestionConsultas(1);
CALL sp_GestionConsultas(2);