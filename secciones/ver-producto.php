<?php

require_once __DIR__ . '/../classes/Producto.php';

$producto = new Producto();
$producto = $producto->porId($_GET['id']);
?>

<main>
    <div class="container container-vermas">
        <h1>Detalles del Producto</h1>
        <div class="row container-product">
            <div class="col-md-6">
                <img class="img-fluid" src="<?= "assets/img/productos/" . $producto->getImagen(); ?>" alt="<?= $producto->getImagenDescripcion(); ?>">
            </div>
            <div class="col-md-6">
                <h2><?= $producto->getTitulo(); ?></h2>
                <p><?= $producto->getDescripcion(); ?></p>
                <p><b>Precio: $<?= $producto->getPrecio(); ?><b></p>
                <button class="btn btn-primary">Agregar al carrito</button>
            </div>
        </div>
    </div>
</main>
