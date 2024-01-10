<?php

require_once __DIR__ . '/../../bootstrap/init.php';

(new Autenticacion())->cerrarSesion();

$_SESSION['mensajeExito'] = "Sesión finalizada con éxito. ¡Esperamos verte de nuevo pronto!";
header('Location: ../index.php?s=iniciar-sesion');
exit;