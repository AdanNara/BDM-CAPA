#SP PARA GESTION DE VIDEOJUEGOS
DELIMITER &&
CREATE PROCEDURE sp_GestionVideojuegos(
	accion tinyint
)
BEGIN
	
    #1 - OBTIENE TODOS LOS DATOS DE JUEGOS
    IF accion = 1 THEN
		SELECT * FROM vw_ListaVideojuegos;
    END IF;
    
    #2 - OBTIENE UNICAMENTE LOS DATOS ID Y NOMBRE
	IF accion = 2 THEN
		SELECT 
        ID,
        Nombre
        FROM vw_ListaVideojuegos;
    END IF;
    
END &&
DELIMITER ;

SHOW CREATE PROCEDURE sp_GestionVideojuegos;
DROP PROCEDURE sp_GestionVideojuegos; 



#EJEMPLO DE EJECUCCION
CALL sp_GestionVideojuegos(1); #TODOS LOS DATOS
CALL sp_GestionVideojuegos(2); #SOLO LA INFORMACION
