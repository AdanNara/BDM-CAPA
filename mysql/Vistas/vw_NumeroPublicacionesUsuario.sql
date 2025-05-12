CREATE VIEW vw_NumeroPublicacionesUsuario AS
SELECT
	u.username AS ID,
	u.nombre AS Nombre,
	COUNT(p.idPublicacion) AS NumeroPublicaciones
FROM usuarios AS u
LEFT JOIN publicaciones AS p
ON u.username = p.usuario
GROUP BY u.username
ORDER BY NumeroPublicaciones DESC;

SELECT * FROM vw_NumeroPublicacionesUsuario;