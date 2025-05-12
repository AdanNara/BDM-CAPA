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
		SELECT * FROM vw_RankingUsuarios;
    END IF;
    
    #7 AGREGAR NOMBRE DE USUARIO DE DISCORD
    IF accion = 7 THEN
		UPDATE usuarios SET discordUser = pdiscordUser WHERE username = pusername;
	END IF;
    
    #8 TRAER NOMBRE DE USUARIO DE DISCORD 
    IF accion = 8 THEN
		SELECT discordUser AS usuarioDiscord
        FROM usuarios 
        WHERE username = pusername;
    END IF;
    
    #9 OBTENER LISTA DE USUARIOS
    IF accion = 9 THEN
		SELECT username, nombre
        FROM usuarios
        WHERE username != pusername;
    END IF;
    
    IF accion = 10 THEN 
		SELECT fn_ultima_modificacion(fechahora_modificacion) as Modificacion
		FROM usuarios
		WHERE username = pusername;
    END IF; 
    
END &&
DELIMITER ;

SHOW CREATE PROCEDURE sp_GestionUsuarios;
DROP PROCEDURE sp_GestionUsuarios;

use db_videopost;

#EJEMPLO DE EJECUCCION
CALL sp_GestionUsuarios(1,'a','Juan Perez','jp@gmail.com','123456',null,null); #REGISTRO
CALL sp_GestionUsuarios(2,'usuario123',null        ,null          ,'123456',null,null); #INICIO SESION
CALL sp_GestionUsuarios(6,null,null,null,null,null,null); #RANKING USUARIOS
CALL sp_GestionUsuarios(7,'admin',null,null,null,'DISCORD',null); #AGREGAR USUARIO DISCORD
CALL sp_GestionUsuarios(8,'admin',null,null,null,null,null); #OBTENER USUARIO DE DISCORD

update usuarios SET discordUser = NULL where username='admin';