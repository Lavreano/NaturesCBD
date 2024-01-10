<?php
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
        <div class="container-tablero"><h1 class="mb-1">Publicar un nuevo Producto</h1></div>

        <form action="acciones/publicar-producto.php" method="post" enctype="multipart/form-data">

            <div class="mb-3 fila-form-edit">
                <label for="titulo">Título *</label>
                <input
                    type="text"
                    id="titulo"
                    name="titulo"
                    class="form-control"
                    value="<?= $dataForm['titulo'] ?? '';?>"
                    aria-describedby="ayuda-titulo <?= isset($errores['titulo']) ? 'error-titulo' : '';?>"
                    <?php
                    if(isset($errores['titulo'])):
                    ?>
                    aria-invalid="true"
                    <?php
                    endif;
                    ?>
                >
                <div class="form-ayuda" id="ayuda-titulo">Debe tener al menos 3 caracteres.</div>                
                <?php
                if(isset($errores['titulo'])):
                ?>
                    <div class="msg-error" id="error-titulo"><?= $errores['titulo'];?></div>
                <?php
                endif;
                ?>
            </div>

            <div class="mb-3 fila-form-edit">
                <label for="descripcion">Descripción *</label>
                <textarea
                    id="descripcion"
                    name="descripcion"
                    class="form-control"
                    <?php
                    if(isset($errores['descripcion'])):
                    ?>
                    aria-invalid="true"
                    aria-describedby="error-descripcion"
                    <?php
                    endif;
                    ?>
                ><?= $dataForm['descripcion'] ?? '';?></textarea>
                <?php
                if(isset($errores['descripcion'])):
                ?>
                    <div class="msg-error" id="error-descripcion"><?= $errores['descripcion'];?></div>
                <?php
                endif;
                ?>
            </div>

            <div class="mb-3 fila-form-edit">
                <label for="precio">Precio *</label>
                <input
                 type="number"
                 id="precio"
                 name="precio"
                 class="form-control"
                 value="<?= $dataForm['precio'] ?? ''; ?>"
                 <?php if(isset($errores['precio'])): 
                ?>
                 aria-invalid="true"
                 aria-describedby="error-precio"
                 <?php endif; ?>>
                <?php if(isset($errores['precio'])): ?>
            <div class="msg-error" id="error-precio"><?= $errores['precio']; ?></div>
                <?php endif; ?>
            </div>

            <div class="mb-3 fila-form-edit">
                <label for="imagen">Imagen (Opcional)</label>
                <input type="file" id="imagen" name="imagen" class="form-control">
            </div>

            <div class="mb-3 fila-form-edit">
                <label for="imagen_descripcion">Descripción de la Imagen (Opcional)</label>
                <input type="text" id="imagen_descripcion" name="imagen_descripcion" class="form-control"
                value="<?= $dataForm['imagen_descripcion'] ?? '';?>" >
            </div>

            <div class="margin-bottom"><button type="submit" class="button">Publicar Producto</button></div>
        </form>

    </section>
</main>
