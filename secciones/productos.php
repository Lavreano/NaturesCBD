<?php
require_once __DIR__ . '/../classes/Producto.php';

$producto = new Producto();
$productos = $producto->todas();
?>

<main>
    <div class="banner-productos">
        <div class="header-productos">
        <h1><span>Productos de CBD</span><br><span class="title-weight">Calidad premium</span></h1>
        <p>Descubrí los diferentes productos con sus beneficios naturales del CBD que tienen para ofrecerle al bienestar de tu cuerpo.<br>
        Nuestra fórmula única y cuidadosamente elaborada te brindara la tranquilidad que buscas día a día.</p></div>
    </div>

    <section class="section-products margen">
        <h2 id="titulo-prod">Productos más destacados de la tienda</h2>

        <div class="btn-group d-flex justify-content-center margen-botones" role="group" aria-label="Categorías">
            <button type="button" class="btn btn-primary button-filter" data-filter="all">Todos</button>
            <button type="button" class="btn btn-primary button-filter" data-filter="categoria1">Aceites</button>
            <button type="button" class="btn btn-primary button-filter" data-filter="categoria2">Gummies</button>
            <button type="button" class="btn btn-primary button-filter" data-filter="categoria3">Capsulas</button>
            <button type="button" class="btn btn-primary button-filter" data-filter="categoria4">Cremas</button>
        </div>

        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-md-8 col-lg-6">
                </div>
            </div>
            <div class="row">

               <?php foreach ($productos as $producto): ?>

                    <div class="col-md-6 col-lg-4 col-xl-3">
                    <div id="product-<?= str_replace(' ', '-', $producto->getProductoId()) ?>" class="single-product">
                            <div class="part-1">
                           <img src="<?= "assets/img/productos/" . $producto->getImagen();?>" alt="<?= $producto->getImagenDescripcion();?>">
                             <ul>
                                    <li><a href="#"><i class="fas fa-shopping-cart"></i></a></li>
                                    <li><a href="#"><i class="fas fa-heart"></i></a></li>
                                    <li><a href="#"><i class="fas fa-plus"></i></a></li>
                                </ul>
                            </div>
                            <div class="part-2">
                                <h3 class="product-titulo"><?= $producto->getTitulo(); ?></h3>
                                <p class="product-precio">$<?= $producto->getPrecio(); ?></p>
                                <a style="text-align:center;" class="product-button" href="index.php?s=ver-producto&id=<?= $producto->getProductoId();?>">Ver más</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
</main>

