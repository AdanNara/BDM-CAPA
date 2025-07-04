#SP PARA GESTION DE CONSULTAS

DELIMITER &&
CREATE PROCEDURE sp_GestionConsultas(
	accion tinyint
)
BEGIN
	#OBTENER PARA LA CANTIDAD DE PUBLICACIONES POR VIDEOJUEGO
	IF accion = 1 THEN
		SELECT * FROM vw_NumeroPublicacionesVideojuego;
	END IF;
    #OBTENER LA CANTIDAD DE PUBLICACIONES POR USUARIO
    IF accion = 2 THEN 
		SELECT * FROM vw_NumeroPublicacionesUsuario;
	END IF;
END && 
DELIMITER ; 

DROP PROCEDURE sp_GestionConsultas;
CALL sp_GestionConsultas(1);
CALL sp_GestionConsultas(2);