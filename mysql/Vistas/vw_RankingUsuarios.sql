CREATE VIEW vw_RankingUsuarios AS 
SELECT 
	u.username AS NombreUsuario,
	COUNT(*) AS TotalPublicaciones
FROM usuarios AS u
JOIN publicaciones AS p
ON u.username = p.usuario
GROUP BY u.username
ORDER BY TotalPublicaciones DESC
LIMIT 3;

SELECT * FROM vw_RankingUsuarios;