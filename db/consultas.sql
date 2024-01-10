/* CREATE SCHEMA `dw3_sierra_laureano` COLLATE utf8mb4_general_ci; */

USE dw3_sierra_laureano;

-- Cargamos los datos en la tabla de roles

INSERT INTO roles
VALUES (NULL, 'Administrador'), (NULL, 'Usuario');

-- Cargamos las categorias

INSERT INTO categorias 
VALUES 
(NULL, 'categoria_aceites'), 
(NULL, 'categoria_cremas'), 
(NULL, 'categoria_capsulas'), 
(NULL, 'categoria_gummies');
               
SELECT * FROM roles;

-- Cargamos los usuarios

INSERT INTO usuarios (rol_fk, email, password)
VALUES (1, 'natures@cbd.com', '12345');

SELECT * FROM usuarios;

-- Cargamos los productos

INSERT INTO productos (usuario_fk, titulo, descripcion, precio, imagen, imagen_descripcion)
VALUES (
1,
'Aceite Sublingual 10ML',
'Aceite Sublingual Natures CBD con 39,9% de CBD 10ML',
 5999,
'assets/img/productos/aceite.jpg',
'Aceite sublingual de CBD de 10ML'
),
(
1,
'Aceite Sublingual 10ML',
'Aceite Sublingual Natures CBD con 39,9% de CBD 30ML',
 8499,
'aceite.jpg',
'Aceite sublingual de CBD de 30ML'
),
(
1,
'Aceite Sublingual Rojo 10% 10ML',
'Aceite Sublingual Natures CBD con 10% de CBD 10ML',
 4999,
'aceite-rojo.jpg',
'Aceite sublingual con un 10% de CBD'
),
(
1,
'Gummies de CBD',
'Gummies Acid Strawberry y Watermelon (de frutilla y sandia) x30 unidades 450mg CBD (15mg CBD por gomita)',
 6799,
'gummies-cbd.jpg',
'Gomitas con efecto CBD'
),
(
1,
'Gummies de THC',
'Gummies Candy x30 unidades 450mg THC (15mg THC por gomita)',
 7999,
'gummies-thc.jpg',
'Gomitas con efecto THC'
),
(
1,
'Capsulas Fish Oil',
'Compuesto: CBD 39,99% + Omega 3,6 y 9. Contiene 60 cápsulas, 1800mg de cbd, aceite de salmón 200mg.',
 11599,
'capsulas.jpg',
'Capsulas de CBD'
),
(
1,
'Crema Corporal para dolores',
'NiCrema Corporal Forte Con tinte de cannabis 40gr.',
 5499,
'crema-corporal.jpg',
'Crema Corporal para tratar dolores'
),
(
1,
'Crema Masajeadora',
'Crema Masajeadora 1000mg + Apitoxina x 50gr.',
 4499,
'crema-masajeadora.jpg',
'Crema para realizar masajes'
);

INSERT INTO productos_tienen_categorias (producto_fk, categoria_fk)
VALUES
(1, 1),
(2, 1), 
(3, 1),
(4, 2), 
(5, 2),
(6, 3),
(7, 3),
(8, 4);

SELECT * FROM productos;
SELECT * FROM categorias;
SELECT * FROM productos_tienen_categorias;

-- Cambiamos las passwd al usuario con id 2
/*UPDATE usuarios
SET password = 'admin123'
WHERE usuario_id = 1;

Eliminar usuarios 
DELETE FROM usuarios
WHERE usuario_id = 2;*/

SELECT * FROM productos WHERE titulo LIKE '%CBD%' OR descripcion LIKE '%CBD%';

/*SELECT p.producto_id, p.titulo, p.descripcion, p.precio, p.imagen, p.imagen_descripcion
FROM productos p
INNER JOIN categorias c ON p.categoria_fk = c.categoria_id
WHERE c.nombre = 'categoria_aceites';*/
SELECT * FROM productos;
/*SELECT * FROM estados_publicacion;

INSERT INTO estados_publicacion (nombre)
VALUES ('Boceto'), ('Publicada'), ('Deshabilitada');

UPDATE productos
SET estado_publicacion_fk = 2;*/


