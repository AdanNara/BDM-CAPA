#FUNCION PARA OBTENER LA ULTIMA MODIFICACION CON FORMATO CORRECTO

use db_videopost;

DELIMITER //
CREATE FUNCTION fn_ultima_modificacion(fecha DATETIME)
RETURNS VARCHAR(100)
DETERMINISTIC
BEGIN
    RETURN CONCAT(
        'Última modificación el ',
        DATE_FORMAT(fecha, '%d %m %Y'),
        ' a las ',
        DATE_FORMAT(fecha, '%H:%i:%s')
    );
END;
//
DELIMITER ;


drop function fn_ultima_modificacion;