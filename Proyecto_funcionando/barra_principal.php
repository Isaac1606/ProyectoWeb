<?php
session_start();

echo '<header>
    <nav class="navbar navbar-expand-xl navbar-dark bg-dark2">
        <div class="container-fluid">
            <a href="index.php" class="ml-xl-4">
                <img src="img/logo.svg" alt="Logotipo">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar"
                    aria-controls="navbar" aria-expanded="false" aria-label="Menu de navegacion">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbar">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a href="index.php" class="nav-link">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a href="categorias.php" class="nav-link">Categorias</a>
                    </li>
                    <li class="nav-item">
                        <a href="postales.php" class="nav-link">Mas populares</a>
                    </li>
                </ul>';

if(isset($_SESSION['usuario'])){
        echo '
        <ul class="navbar-nav mr-left">
        <li class="nav-item dropdown">
            <a href="" class="nav-link dropdown-toggle" id="menu-categorias" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Mi perfil</a>
                <div class="dropdown-menu bg-dark" aria-labelledby="menu-categorias">
                    <a href="postales_enviadas.php" class="dropdown-item text-secondary">Postales Enviadas</a>
                    <a href="postales_recibidas.php" class="dropdown-item text-secondary">Postales Recibidas</a>
                    <a href="cerrar_sesion.php" class="dropdown-item text-secondary">Cerrar Sesion</a>
                </div>
            </li>
        </ul>';
        if($_SESSION['tipo']=='admin'){
        echo'
        <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <a href="" class="nav-link dropdown-toggle" id="menu-categorias" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Administrador</a>
                <div class="dropdown-menu bg-dark" aria-labelledby="menu-categorias">
                    <a href="imagenes.php" class="dropdown-item text-secondary">Imagenes</a>
                    <a href="usuarios.php" class="dropdown-item text-secondary">Usuarios</a>
                    <a href="detalles.php" class="dropdown-item text-secondary">Detalles</a>
                </div>
            </li>
        </ul>';
    }
    echo '
        <a>
            <img src="data:image/jpeg;base64,'.base64_encode($_SESSION['imagen']).'" width="40"/>
        </a>
    ';
} else{
    echo '
        <button type="button" class="btn text-white mr-2" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Iniciar sesión</button>
        <a href="formulario.php" class="btn btn-outline-light text-uppercase">Crear una cuenta</a>';
}
echo'
</div>
</div>
</nav>
</header>';
?>
