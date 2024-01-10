<?php
//require_once __DIR__ . '/../../classes/DbConexion.php';
//require_once __DIR__ . '/../../classes/Producto.php';
//require_once __DIR__ . '/../../classes/Autenticacion.php';
require_once __DIR__ . '/../../bootstrap/init.php';

$autenticacion = new Autenticacion();

if(!$autenticacion->estaAutenticado()) {
    $_SESSION['mensajeError'] = "Esta acción requiere inicio de sesión. Por favor, inicia sesión para continuar.";
    header("Location: ../index.php?s=iniciar-sesion");
    exit;
}

// 1. Capturamos los datos 

$id                     = $_GET['id'];
$titulo                 = $_POST['titulo'];
$descripcion            = $_POST['descripcion'];
$precio                 = $_POST['precio'];
$imagen                 = $_FILES['imagen'];
$imagen_descripcion     = $_POST['imagen_descripcion'];

// 2. TODO: Validar
$errores = [];

// Título.
if(empty($titulo)) {
    $errores['titulo'] = "El título es obligatorio. Por favor, ingresalo.";
} else if(strlen($titulo) < 3) {
    $errores['titulo'] = "El título debe tener al menos 3 caracteres. Ingresa un título más largo.";
}

// Descripción.
if(empty($descripcion)) {
    $errores['descripcion'] = "La descripción es obligatoria. Por favor, proporciónala.";
}

// Precio.
if (empty($precio)) {
    $errores['precio'] = "Por favor, especifica el precio del producto.";
}

if(count($errores) > 0) {
    $_SESSION['mensajeError'] = "Parece que hay algunos problemas con la información que proporcionaste. Por favor, verifica los campos y vuelve a intentarlo.";
    $_SESSION['errores'] = $errores;
    $_SESSION['dataForm'] = $_POST;

    header("Location: ../index.php?s=editar-producto&id=" . $id);
    exit;
}

// 3. TODO: Subir la imagen

if(!empty($imagen['tmp_name'])) {
    $nombreImagen = date('YmdHis') . "_" . $imagen['name'];

    move_uploaded_file($imagen['tmp_name'], IMGS_PATH . '/' . $nombreImagen);
}

// 4. Grabar.
try {

    $producto = (new Producto())->porId($id);

    (new Producto())->editar($id, [
        'usuario_fk' => $usuario_fk,
        'titulo' => $titulo,
        'descripcion' => $descripcion,
        'precio' => $precio,
        'imagen' => $nombreImagen ?? $producto->getImagen(),
        'imagen_descripcion' => $imagen_descripcion,
    ]);

    // 5. Redireccionar.

    $_SESSION['mensajeExito'] = "El producto <b>" . "&nbsp;" . $titulo . "&nbsp;" . "</b> fue editado exitosamente.";
    header("Location: ../index.php?s=productos");
    exit;
} catch(Exception $e) {
    $_SESSION['mensajeError'] = "Ocurrió un error inesperado al tratar de editar el producto. Por favor, probá de nuevo más tarde.";
    $_SESSION['dataForm'] = $_POST;
    header("Location: ../index.php?s=editar-producto&id=" . $id);
    exit;
}