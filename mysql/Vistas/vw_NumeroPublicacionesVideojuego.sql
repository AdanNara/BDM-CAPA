CREATE VIEW vw_NumeroPublicacionesVideojuego AS
SELECT 
	CAST(v.idVideojuego AS CHAR) AS ID,
	v.nombre AS Nombre,
	COUNT(p.idPublicacion) AS NumeroPublicaciones
FROM videojuegos AS v
LEFT JOIN publicaciones AS p
ON v.idVideojuego = p.videojuego
GROUP BY v.idVideojuego
ORDER BY NumeroPublicaciones DESC; 


SELECT * FROM vw_NumeroPublicacionesVideojuego;