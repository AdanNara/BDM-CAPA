#VISTA PARA LA API
create view vw_ListaUsuariosAPI as
SELECT 
    username, 
    nombre, 
    correoE, 
    CASE 
        WHEN tipoUsuario = 0 THEN 'USUARIO'
        WHEN tipoUsuario = 1 THEN 'ADMINISTRADOR'
    END AS tipoUsuario
FROM usuarios;

SELECT * FROM vw_ListaUsuariosAPI;

