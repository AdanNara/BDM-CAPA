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
		SELECT * FROM vw_ReportesPendientes;
	END IF;
     #OBTENER LISTA DE REPORTES REVISADOS
    IF accion = 3 THEN 
		SELECT * FROM vw_ReportesRevisados;
    END IF;
    IF accion = 4 THEN 
		UPDATE reportes SET estado = 1 WHERE idReporte = pid;
    END IF;
    
END &&
DELIMITER ;

DROP PROCEDURE sp_GestionReportes;
CALL sp_GestionReportes(1, NULL, 'OTRO', 'esto no es un meme, es una llamada de auxilio' , 'usuario5');
CALL sp_GestionReportes(2, NULL, NULL, NULL , NULL);
CALL sp_GestionReportes(3, NULL, NULL, NULL , NULL);
CALL sp_GestionReportes(4, 1, NULL, NULL , NULL);
TRUNCATE TABLE reportes;
select * from reportes;