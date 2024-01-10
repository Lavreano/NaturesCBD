<?php
require_once __DIR__ . '/../../classes/DbConexion.php';
require_once __DIR__ . '/../../classes/Producto.php';

$producto = (new Producto())->porId($_GET['id']);
?>

<main>
    <div class="container container-vermas">
        <div class="container-tablero">
        <h1 class="mb-4">Confirmación para Eliminar Producto</h1>
        <p class="mb-4">Estás por eliminar el siguiente producto, y se necesita una confirmación para hacerlo:</p></div>

        <div class="row container-product">
            <div class="col-md-6">
                <img src="<?= "../assets/img/productos/" . $producto->getImagen(); ?>" alt="<?= $producto->getImagenDescripcion(); ?>" class="img-fluid">
            </div>
            <div class="col-md-6">
                <h2><?= $producto->getTitulo(); ?></h2>
                <p><?= $producto->getDescripcion(); ?></p>
                <p><b>Precio: $<?= $producto->getPrecio(); ?></b></p>

                <form action="acciones/eliminar-producto.php?id=<?= $producto->getProductoId(); ?>"  method="post" enctype="multipart/form-data">
                    <button type="submit" class="btn btn-danger">Confirmar eliminación</button>
                </form>
            </div>
        </div>
    </div>
</main>