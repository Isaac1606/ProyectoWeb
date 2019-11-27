SELECT nombre_imagen from imagen WHERE envios in (SELECT MAX(envios) FROM imagen);

SELECT nombre_categoria, COUNT(*) as envios 
FROM categoria
GROUP BY nombre_categoria;

CREATE VIEW enviosxcat AS SELECT nombre_categoria, COUNT(*) as envios FROM categoria GROUP BY nombre_categoria;

SELECT nombre_categoria from enviosxcat WHERE envios in (SELECT MAX(envios) FROM enviosxcat);

