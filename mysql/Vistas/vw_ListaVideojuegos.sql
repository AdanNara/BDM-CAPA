
#VISTA PARA LA API
create view vw_ListaVideojuegos as
SELECT 
	idVideojuego as ID,
    nombre as Nombre, 
    caratula as URL
FROM videojuegos;

SELECT * FROM vw_ListaVideojuegos;