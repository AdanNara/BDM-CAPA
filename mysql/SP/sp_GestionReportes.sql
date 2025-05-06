#SP PARA GESTION DE REPORTES

DELIMITER &&
CREATE PROCEDURE sp_GestionReportes(
	accion tinyint,
    pid int,
    ptipo varchar(50),
    pdescripcion text,
    pusuario varchar(20)
)
BEGIN
	#AGREGAR REPORTE
	IF accion = 1 THEN
		INSERT INTO reportes (tipo, descripcion, usuario)
        VALUES (ptipo, pdescripcion, pusuario);
		
	END IF; 
    #OBTENER LISTA DE REPORTES PENDIENTES
    IF accion = 2 THEN
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
	END IF;
    #REVISION DE REPORTE
    IF accion = 3 THEN 
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
        WHERE r.estado = 1;
    END IF;
    IF accion = 4 THEN 
		UPDATE reportes SET estado = 1 WHERE idReporte = pid;
    END IF;
    
END &&

DROP PROCEDURE sp_GestionReportes;
CALL sp_GestionReportes(1, NULL, 'OTRO', 'esto no es un meme, es una llamada de auxilio' , 'usuario5');
CALL sp_GestionReportes(2, NULL, NULL, NULL , NULL);
CALL sp_GestionReportes(3, NULL, NULL, NULL , NULL);
CALL sp_GestionReportes(4, 1, NULL, NULL , NULL);
TRUNCATE TABLE reportes;
select * from reportes;