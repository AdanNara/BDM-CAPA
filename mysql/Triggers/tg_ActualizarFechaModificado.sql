#TRIGGER PARA CAMBIAR LA FECHA EN LA CUAL SE HIZO UNA MODIFICACION DEL PERFIL DEL USUARIO

DELIMITER //
CREATE TRIGGER tg_ActualizarFechaModificado
BEFORE UPDATE ON usuarios
FOR EACH ROW
BEGIN
    SET NEW.fechahora_modificacion = NOW();
END;
//
DELIMITER ;

DROP TRIGGER tg_ActualizarFechaModificado;