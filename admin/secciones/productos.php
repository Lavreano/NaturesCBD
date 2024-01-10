<?php
//require_once __DIR__ . '/../../classes/Producto.php';
$productos = (new Producto())->todas();
?>

<main>
  <section class="container-tablero">
    <h1>Administración de los Productos</h1>

    <div class="mb-1 mt-4">
            <a class="button" href="index.php?s=nuevo-producto">Publicar un nuevo Producto</a>
        </div>

        <div class="container-fluid mt-4">
      <div class="card mb-4 sombra-tabla">
        <div class="card-body">
          <div class="row">
            <div class="col-md-12">
              <h2 class="pt-3 pb-4 text-center font-bold">Tus Productos Publicados</h2>
              <div class="input-group group-border md-form form-sm form-2 pl-0">
                <input class="form-control my-0 py-1 pl-3" type="text" placeholder="Busca tu producto" aria-label="Search">
                <span class="icono-background"><a><i class="fa fa-search icono-search" aria-hidden="true"></i></a></span>
              </div>
            </div>
          </div>
        <table class="table">
            <thead>
            <tr>
                <th><i class="tabla fa-solid fa-fingerprint"></i> ID</th>
                <th><i class="tabla fa-solid fa-heading"></i> Título</th>
                <th><i class="tabla fa-solid fa-align-center"></i> Descripción</th>
                <th><i class="tabla fa-solid fa-hand-holding-dollar"></i> Precio</th>
                <th><i class="tabla fa-regular fa-image"></i> Imagen</th>
                <th><i class="tabla fa-solid fa-circle-exclamation"></i> Acciones</th>
            </tr>
            </thead>
            <tbody>

            <?php
            foreach($productos as $producto):
            ?>

                <tr>
                    <td><?= $producto->getProductoId();?></td>
                    <td><?= $producto->getTitulo();?></td>
                    <td><?= $producto->getDescripcion();?></td>
                    <td><?= $producto->getPrecio();?></td>
                    <td><img src="<?= '../assets/img/productos/' . $producto->getImagen();?>" alt="<?= $producto->getImagenDescripcion();?>"></td>
                    <td>
                        <a class="edit" href="index.php?s=editar-producto&id=<?= $producto->getProductoId();?>"><i class="tabla fa-solid fa-pen edit"></i> Editar</a><br>
                        <a class="eliminar" href="index.php?s=eliminar-producto&id=<?= $producto->getProductoId();?>"><i class="tabla fa-solid fa-circle-xmark eliminar"></i> Eliminar</a>
                    </td>
                </tr>
            <?php
            endforeach;
            ?>
            </tbody>
        </table>
        </div>
        </div>
        </div>
    </section>
</main>