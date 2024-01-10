<?php
    require_once __DIR__ . '/classes/DBConexion.php';

    $ruta = $_GET['s'] ?? 'home';

    $listaRutas = [
        'home' => [
            'titulo' => 'Página Principal',
        ],
        'productos' => [
            'titulo' => 'Productos',
        ],
        'ver-producto' => [
            'titulo' => 'Detalle del Producto',
        ],
        'nosotros' => [
            'titulo' => 'Sobre',
        ],
        'contacto' => [
            'titulo' => 'Contactanos',
        ],
        'iniciar-sesion' => [
            'titulo' => 'Ingresar a tu Cuenta',
        ],
        'registro' => [
            'titulo' => 'Crear una Cuenta Nueva',
        ],
        '404' => [
            'titulo' => 'No se encontro la página',
        ],
    ];

    if (!isset($listaRutas[$ruta])) {
        $ruta = '404';
    }
    
    $rutaConfig = $listaRutas[$ruta];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $rutaConfig['titulo'];?> Nature's CBD</title>
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.4.2/css/all.css" crossorigin="anonymous">
    <link rel="icon" type="image/png" sizes="192x192" href="assets/img/android-chrome-192x192.png">
    <link rel="icon" type="image/png" sizes="512x512" href="assets/img/android-chrome-512x512.png">
    <link rel="apple-touch-icon" href="assets/img/apple-touch-icon.png">
    <link rel="shortcut icon" href="assets/img/favicon.ico">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicon-16x16.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicon-32x32.png">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/script.js"></script>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">
                    <figure>
                        <picture>
                          <source srcset="assets/img/logo-movil.jpg" media="(max-width: 480px)" >
                          <img src="assets/img/logo.jpg" alt="Imagotipo Nature's CBD">
                        </picture>
                    </figure>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item ml-2">
                            <a class="nav-link" href="index.php">Home</a>
                        </li>
                        <li class="nav-item ml-2">
                            <a class="nav-link" href="index.php?s=productos">Productos</a>
                        </li>
                        <li class="nav-item ml-2">
                            <a class="nav-link" href="index.php?s=nosotros">Nosotros</a>
                        </li>
                        <li class="nav-item ml-2">
                            <a class="nav-link" href="index.php?s=contacto">Contacto</a>
                        </li>
                        <li class="nav-item ml-2">
                            <a class="nav-link" href="index.php"><i class="fa-solid fa-cart-shopping"></i></a>
                        </li>
                        <li class="nav-item ml-2">
                            <a class="nav-link" href="index.php"><i class="fa-solid fa-circle-user"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

<?php
    require __DIR__ . '/secciones/' . $ruta . '.php';
    ?>

<footer class="w-100 py-4 flex-shrink-0">
        <div class="container py-4">
            <div class="row gy-4 gx-5">
                <div class="col-lg-4 col-md-6">
                    <img src="assets/img/logo-footer.png" alt="Imagotipo Nature's CBD">
                    <p class="small text-gray mt-4">Sitio Web realizado por Laureano Sierra, abarcando desde la identidad de marca hasta el diseño y desarrollo de la tienda E-Commerce Nature’s CBD.</p>
                    <p class="small text-gray mb-0">&copy; Copyrights. Todos los derechos estan reservados.</p>
                </div>
                <div class="col-lg-2 col-md-6">
                    <h5 class="text-white mb-3">Seguinos</h5>
                    <ul class="list-unstyled li-footer">
                        <li><a href="https://www.facebook.com/"><i class="fa-brands fa-facebook"></i> Facebook</a></li>
                        <li><a href="https://twitter.com/"><i class="fa-brands fa-twitter"></i> Twitter</a></li>
                        <li><a href="https://instagram.com/"><i class="fa-brands fa-instagram"></i> Instagram</a></li>
                        <li><a href="https://linkedin.com/"><i class="fa-brands fa-linkedin"></i> Linkedin</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-6">
                    <h5 class="text-white mb-3">Enlaces</h5>
                    <ul class="list-unstyled li-footer">
                        <li><a href="#">Términos</a></li>
                        <li><a href="#">Politica y Privacidad</a></li>
                        <li><a href="index.php?s=nosotros">Nosotros</a></li>
                        <li><a href="index.php?s=contacto">Contacto</a></li>
                    </ul>
                </div>
                <div class="col-lg-4 col-md-6">
                    <h5 class="text-white mb-3">Newsletter</h5>
                    <form action="#">
                      <div class="input-group mb-3 form-footer">
                        <label class="label-newsletter" for="email">Ingresa tu correo electrónico para recibir noticias de nuestras promociones semanales</label>
                          <div class="input-button-container">
                          <input class="form-control" type="text" id="email" placeholder="Correo Electrónico" aria-label="Correo electrónico" aria-describedby="button-newsletter">
                          <a class="btn btn-primary" id="button-newsletter" type="button"><i class="fas fa-paper-plane"></i> Suscribirse</a></div>
                      </div>
                    </form>
                </div>
            </div>
        </div>
</footer>

</body>
</html>