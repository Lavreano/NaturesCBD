<main class="main-content iniciar-sesion">
    <section class="container">
        <h1 class="mb-1">Ingresar al Panel de Administración</h1>

        <div class="form-iniciar-sesion">
        <form action="acciones/iniciar-sesion.php" method="post">
            <div class="form-fila-sesion">
                <label for="email"><i class="tabla fa-solid fa-user"></i> Correo Electrónico</label>
                <input type="email" name="email" id="email" class="form-control">
            </div>
            <div class="form-fila-sesion">
                <label for="password"><i class="tabla fa-solid fa-lock"></i> Contraseña</label>
                <input type="password" name="password" id="password" class="form-control">
            </div>
            <button type="submit" class="form-fila-button">Ingresar</button>
        </form></div>
    </section>
</main>