<?php
if($_SESSION['rolUsuario'] == "Administrador"){
    $img = "admin-logo.";
}else{
    $img = "user-logo.";
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="paginas/estilos/style.css" media="all">
    <link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/85be78ad34.js" crossorigin="anonymous"></script>
    <title>SRC</title>
</head>
<body>
<div class="container-fluid">
    <header>
    <div class="row">
        <div class="col-4 text-center">
          <img src="paginas/imagenes/sistema/logo.png" class="img-fluid logo-sys" alt="...">
        </div>
        <div class="col title-logo">
            <img src="paginas/imagenes/sistema/<?=$img?>png" class="img-fluid logo-user" alt="..."><span class="title"><?=$_SESSION['rolUsuario'] . " - " . $_SESSION['nomUsuario']?></span>
        </div>
    </div>
        <div class="row">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark bg-gradient">
              <div class="container-fluid">
                <a class="navbar-brand" href="#">SRC | <?=$pagina?></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                      <li class="nav-item">
                      <a class="nav-link" href="inicio.php?op=cuentas">Cuentas</a>
                    </li>
                      <?php
                    
                      
                      ?>
                    <li class="nav-item">
                      <a class="nav-link" href="inicio.php?op=seguimientos">Seguimientos</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="inicio.php?op=progreso">Convenios</a>
                    </li>
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Reportes
                      </a>
                      <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" target="_blank" href="inicio.php?op=progreso">General</a></li>
                      </ul>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="inicio.php?op=about">Acerca de...</a>
                    </li>
                  </ul>
                  <form class="d-flex">
                    <button class="btn btn-outline btn-sys" name="salir" id="salir" type="submit">Cerrar sesión</button>
                  </form>
                </div>
              </div>
            </nav>
        </div>
    </header>