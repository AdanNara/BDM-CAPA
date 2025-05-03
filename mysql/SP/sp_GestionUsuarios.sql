#SP PARA GESTION DE USUARIOS
DELIMITER &&
CREATE PROCEDURE sp_GestionUsuarios(
	accion tinyint,
    pusername varchar(20),
    pnombre varchar(50),
    pcorreoE varchar(50), 
	pcontrasena varchar(255),
	pdiscordUser varchar(40),
	pfotoPerfil mediumblob 
)
BEGIN
	#1 REGISTRAR USUARIO
	IF accion = 1 THEN
		INSERT INTO usuarios (username, nombre, correoE, contrasena)
		VALUES (pusername, pnombre, pcorreoE, pcontrasena);
	END IF;
    
    #2 INICIAR SESION
    IF accion = 2 THEN
		SELECT username, nombre, correoE, tipoUsuario, contrasena
        FROM usuarios 
        WHERE username = pusername;
    END IF;
    
    #3 MODIFICAR INFOUSUARIO
    IF accion = 3 THEN
		UPDATE usuarios
			SET username = pusername,
            nombre = pnombre,
            correoE = pcorreoE,
            contrasena = pcontrasena
		WHERE username = pusername;
	END IF; 
    
    #4 SUBIR FOTO DE PERFIL
    IF accion = 4 THEN
		UPDATE usuarios
			SET fotoPerfil = pfotoPerfil
		WHERE username = pusername;
    END IF;
    
    #5 TRAER FOTO DE PERFIL
	IF accion = 5 THEN
			SELECT fotoPerfil 
            FROM usuarios
            WHERE  username = pusername;
    END IF;
    #6 RANKING DE USUARIOS CON MAYOR NUMERO DE PUBLICACIONES
    IF accion = 6 THEN
		SELECT 
			u.username AS NombreUsuario,
			COUNT(*) AS TotalPublicaciones
		FROM usuarios AS u
		JOIN publicaciones AS p
		ON u.username = p.usuario
		GROUP BY u.username
		ORDER BY TotalPublicaciones DESC
		LIMIT 3;
    END IF;
    
END &&
DELIMITER ;

SHOW CREATE PROCEDURE sp_GestionUsuarios;
DROP PROCEDURE sp_GestionUsuarios;

#EJEMPLO DE EJECUCCION
CALL sp_GestionUsuarios(1,'a','Juan Perez','jp@gmail.com','123456',null,null); #REGISTRO
CALL sp_GestionUsuarios(2,'usuario123',null        ,null          ,'123456',null,null); #INICIO SESION
CALL sp_GestionUsuarios(6,null,null,null,null,null,null); #RANKING USUARIOS
