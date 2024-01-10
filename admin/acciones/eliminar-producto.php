<?php
//require_once __DIR__ . '/../../classes/DbConexion.php';
//require_once __DIR__ . '/../../classes/Producto.php';
//require_once __DIR__ . '/../../classes/Autenticacion.php';
require_once __DIR__ . '/../../bootstrap/init.php';

$autenticacion = new Autenticacion();

if(!$autenticacion->estaAutenticado()) {
    $_SESSION['mensajeError'] = "Para realizar esta acción requiere iniciar sesión, por favor logueate.";
    header("Location: ../index.php?s=iniciar-sesion");
    exit;
}

$id = $_GET['id']; 

try {
    (new Producto())->eliminar($id);

    $_SESSION['mensajeExito'] = "El producto fue eliminado exitosamente.";
    header("Location: ../index.php?s=productos");
    exit;
} catch(Exception $e) {
    $_SESSION['mensajeError'] = "Ocurrió un error al tratar de eliminar el producto, por favor vuelva a intentar de nuevo.";
    header("Location: ../index.php?s=productos");
    exit;
}