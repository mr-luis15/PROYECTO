<?php

    require_once '../../app/routes/RouteController.php';

?>


<nav class="navbar navbar-dark bg-dark">

    <div class="container-fluid">

        <a class="navbar-brand" href="#">Clima Polar del Pacifico</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">

            <div class="navbar-nav">

                <a class="nav-link active" aria-current="page" href="bienvenido.php">Home</a>
                <a class="nav-link" href= <?php echo Route::app("login"); ?> >Iniciar Sesion</a>
                <a class="nav-link" href= <?php echo Route::app("registrarse"); ?> >Registrarse</a>
                <a class="nav-link" href="mision.php">Mision</a>
                <a class="nav-link" href="vision.php">Vision</a>
                <a class="nav-link" href="contactanos.php">Contactanos</a>

            </div>

        </div>

    </div>

</nav>