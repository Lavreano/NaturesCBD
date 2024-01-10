<?php
//require_once __DIR__ . '/../../classes/DbConexion.php';
//require_once __DIR__ . '/../../classes/Usuario.php';
//require_once __DIR__ . '/../../classes/Producto.php';
//require_once __DIR__ . '/../../classes/Autenticacion.php';

require_once __DIR__ . '/../../bootstrap/init.php';

$email      = $_POST['email'];
$password   = $_POST['password'];

$autenticacion = new Autenticacion();

if(!$autenticacion->iniciarSesion($email, $password)) {
    $_SESSION['mensajeError'] = "Las credenciales ingresadas son incorrectas. Por favor, verifica tu email y contraseña.";
    header('Location: ../index.php?s=iniciar-sesion');
    exit;
}

$_SESSION['mensajeExito'] = "Sesión iniciada con éxito. ¡Te damos la bienvenida <b> " . "&nbsp;"  . $autenticacion->getUsuario()->getEmail() . "&nbsp;" . " </b> de nuevo!";
header('Location: ../index.php?s=home');
exit;

