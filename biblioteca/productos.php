<?php
//require_once __DIR__ . '/../secciones/productos.php';
require_once __DIR__ . '/../classes/Producto.php';

/**
 *
 * @return Producto[]
 */

function obtenerProductos(): array {

    $rutaAlArchivo = __DIR__ . '/../js/productos.json';
    $registros = json_decode(file_get_contents($RutaAlArchivo), true);
    //$jsonData = file_get_contents(__DIR__ . '/../js/productos.json');
    //$productos = json_decode($jsonData, true);

$salida = [];

foreach ($registros as $registro) {
    $producto = new Producto;

    $producto->setProductoId($registro['producto_id']);
    $producto->setTitulo($registro['titulo']);
    $producto->setDescripcion($registro['descripcion']);
    $producto->setPrecio($registro['precio']);
    $producto->setImagen($registro['imagen']);
    $producto->setImagenDescripcion($registro['imagen_descripcion']);

    $salida[] = $producto;
}

return $salida;
}

/**
 * @param int $id
 * @return Producto
 */

function obtenerProductoPorId(int $id) : Producto {
    $productos = obtenerProductos();

    foreach($productos as $producto) {
        if($producto->getProductoId() === $id ) {
            return $producto;
        }
    }
}