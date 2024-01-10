<?php
require_once __DIR__ . '/../../classes/DbConexion.php';
require_once __DIR__ . '/../../classes/Producto.php';

$producto = (new Producto())->porId($_GET['id']);

if(isset($_SESSION['errores'])) {
    $errores = $_SESSION['errores'];
    unset($_SESSION['errores']);
} else {
    $errores = [];
}

if(isset($_SESSION['dataForm'])) {
    $dataForm = $_SESSION['dataForm'];
    unset($_SESSION['dataForm']);
} else {
    $dataForm = [];
}
?>

<main class="main-content">
    <section class="container">
        <div class="container-tablero">
        <h1 class="mb-4">Editar el producto: "<b><?= $producto->getTitulo();?></b>"</h1></div>

        <form action="acciones/editar-producto.php?id=<?= $producto->getProductoId();?>" method="post" enctype="multipart/form-data">

            <div class="mb-3 fila-form-edit">
                <label for="titulo" class="form-label">Título *</label>
                <input
                    type="text"
                    id="titulo"
                    name="titulo"
                    class="form-control"
                    value="<?= $dataForm['titulo'] ?? $producto->getTitulo();?>"
                    aria-describedby="ayuda-titulo <?= isset($errores['titulo']) ? 'error-titulo' : '';?>"
                    <?php if(isset($errores['titulo'])): ?>
                        aria-invalid="true"
                    <?php endif; ?>
                >
                <div id="ayuda-titulo" class="form-text">Debe tener al menos 3 caracteres.</div>
                <?php if(isset($errores['titulo'])): ?>
                    <div class="msg-error" id="error-titulo"><?= $errores['titulo'];?></div>
                <?php endif; ?>
            </div>

            <div class="mb-3 fila-form-edit">
                <label for="descripcion" class="form-label">Descripción *</label>
                <textarea
                    id="descripcion"
                    name="descripcion"
                    class="form-control"
                    <?php if(isset($errores['descripcion'])): ?>
                        aria-invalid="true"
                        aria-describedby="error-descripcion"
                    <?php endif; ?>
                ><?= $dataForm['descripcion'] ?? $producto->getDescripcion();?></textarea>
                <?php if(isset($errores['descripcion'])): ?>
                    <div class="msg-error" id="error-descripcion"><?= $errores['descripcion'];?></div>
                <?php endif; ?>
            </div>

            <div class="mb-3 fila-form-edit">
                <label for="precio" class="form-label">Precio *</label>
                <input
                    type="number"
                    id="precio"
                    name="precio"
                    class="form-control"
                    value="<?= $dataForm['precio'] ?? $producto->getPrecio();?>"
                    <?php if(isset($errores['precio'])): ?>
                        aria-invalid="true"
                        aria-describedby="error-precio"
                    <?php endif; ?>
                >
                <?php if(isset($errores['precio'])): ?>
                    <div class="msg-error" id="error-precio"><?= $errores['precio']; ?></div>
                <?php endif; ?>
            </div>

            <div class="mb-3 fila-form-edit">
                <p class="form-label">Imagen actual</p>
                <?php if(!empty($producto->getImagen())): ?>
                    <img src="<?= '../assets/img/productos/' . $producto->getImagen();?>" alt="">
                <?php else: ?>
                    <p><i>No tiene una imagen.</i></p>
                <?php endif; ?>
            </div>

            <div class="mb-3 fila-form-edit">
                <label for="imagen" class="form-label">Imagen <span class="small">(opcional)</span></label>
                <input
                    type="file"
                    id="imagen"
                    name="imagen"
                    class="form-control"
                    aria-describedby="ayuda-imagen"
                >
                <p id="ayuda-imagen" class="form-text">Solo elegí una imagen si querés cambiar la actual.</p>
            </div>

            <div class="mb-3 fila-form-edit">
                <label for="imagen_descripcion" class="form-label">Descripción de la Imagen <span class="small">(opcional)</span></label>
                <input
                    type="text"
                    id="imagen_descripcion"
                    name="imagen_descripcion"
                    class="form-control"
                    value="<?= $dataForm['imagen_descripcion'] ?? $producto->getImagenDescripcion();?>"
                >
            </div>
            <div class="margin-bottom">
            <button type="submit" class="btn btn-primary">Editar Producto</button></div>
        </form>

    </section>
</main>
