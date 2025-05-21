#FUNCION PARA LA REPUTACION DEL USUARIO

use db_videopost;

DELIMITER //
CREATE FUNCTION fn_reputacion_usuario(username VARCHAR(20))
RETURNS INT
DETERMINISTIC
BEGIN
    DECLARE reputacion INT;
    
    SELECT COALESCE(SUM(calificacion), 0) INTO reputacion
    FROM publicaciones
    WHERE usuario = username;
    
    RETURN reputacion;
END;
//
DELIMITER ;

SELECT fn_reputacion_usuario('admin');

SELECT SUM(calificacion) AS REPUTACION
    FROM publicaciones
    WHERE usuario = 'webo';