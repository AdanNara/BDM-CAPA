
#SP PARA MANEJO DE MENSAJES
DELIMITER &&
CREATE PROCEDURE sp_GestionMensaje(
accion int,
premitente varchar(20),
pdestinatario varchar(20),
pmensaje text
)
BEGIN 
	#1 Enviar mensaje
	IF accion = 1 THEN
		INSERT INTO mensajes(remitente, destinatario, mensaje)
        VALUES (premitente, pdestinatario, pmensaje);
    END IF;
    
    #2 Obtiene los mensajes de una conversacion
	IF accion = 2 THEN
		SELECT remitente, destinatario, mensaje
        FROM mensajes
        WHERE (remitente = premitente AND destinatario = pdestinatario)
        OR (remitente = pdestinatario AND destinatario = premitente)
        ORDER BY fechahora ASC;
    END IF; 
    
END &&
DELIMITER ;