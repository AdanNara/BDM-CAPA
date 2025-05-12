CREATE VIEW vw_ReportesPendientes AS 
SELECT 
	r.idReporte AS ID,
	r.tipo AS Tipo,
	r.descripcion AS Descripcion,
	u.username AS Usuario, 
	r.fechahora AS FechaHora,
	r.estado AS Estado
FROM reportes AS r
JOIN usuarios AS u
ON r.usuario = u.username
WHERE r.estado = 0;

SELECT * FROM vw_ReportesPendientes;