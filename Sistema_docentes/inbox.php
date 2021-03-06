<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio Docentes | Plataforma de gestión académica Rexel</title>
    <link rel="shortcut icon" href="static/img/logo_wolf.ico" class="icon-pestaña">

    <!--Bootstrap-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <!--css-->

    <link rel="stylesheet" href="static/css/panel.css">
    <!-- JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</head>
<body>
  <?php
    session_start();
    include '../bd_universidad/API_REST_UNIVERSIDAD/funcs.php';
    if($_SESSION!=null)
    {

    }
    else
    {
      header("Location: ../index.html");
    }
  ?>
    <div class="d-flex" id="wrapper" class="toggled">
        <!-- Sidebar -->
        <div class="bg-dangeri border-right" id="sidebar-wrapper">
        
          <div class="sidebar-heading text-light">
          <a href="index.html" class="navbar-left"><img src="../static/img/logo_wolf.ico" alt="" style="max-width: 50px; padding-right: 5px;"></a>Universidad Rexel</div>
          <div class="sidebar-heading text-light"><span><?php $ruta= showImagenPerfilDocente(); echo "<img src=\"$ruta\" style=\"width:40px; height:40px; border-radius: 50%;\">"; ?></span>  Docente</div>
          <div class="list-group list-group-flush">
            <a href="inbox.php" class="list-group-item list-group-item-action bg-dangeri text-light text-sidebar"><img src="static/img/email.svg" style="width: 14px;height: 20px;"> Correo</a>
            <a href="profile.php" class="list-group-item list-group-item-action bg-dangeri text-light text-sidebar">Perfil</a>
            <a href="secciones.php" class="list-group-item list-group-item-action bg-dangeri text-light text-sidebar">Secciones</a>
            <a href="horario.php" class="list-group-item list-group-item-action bg-dangeri text-light text-sidebar">Horario</a>
            <a href="#" class="list-group-item list-group-item-action bg-dangeri text-light text-sidebar">Solicitar sección</a>
            <a href="#collapseExample" class="list-group-item list-group-item-action bg-dangeri text-light text-sidebar" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseExample">Documentos</a>
            <div class="collapse" id="collapseExample">
            <div class="container-fluid">
                <div class="container">
                    <br>
                    <ul class="border-left border-white docs text-sidebar">
                        <li class="docs">Liquidaciones de sueldo</li>
                        <li class="docs">Notificar licencia médica</li>
                        <li class="docs">Contrato</li>
                    </ul>
                </div>   
            </div>
            </div>
          </div>
        </div>
        <!-- /#sidebar-wrapper -->
    
        <!-- Page Content -->
        <div id="page-content-wrapper">
    
          <nav class="navbar navbar-expand-lg navbar-primary bg-dangeri border-bottom">
            <button class="btn bg-dangeri" id="menu-toggle"> <img src="static/img/layout.svg" style="width: 15px; height: 30px;"> </button>
    
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
    
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                  <a class="nav-link text-light" href="panel_docentes.php">Inicio <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Usuario
                  </a>
                  <div class="dropdown-menu dropdown-menu-right bg-primary" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item text-light" href="#">Action</a>
                    <a class="dropdown-item text-light" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-light" href="logout.php">Cerrar sesión</a>
                  </div>
                </li>
              </ul>
            </div>
          </nav>
    
          <div class="container-fluid">
            <h1 class="mt-4">
               


            </h1>
          </div>
        </div>
        <!-- /#page-content-wrapper -->
    
      </div>
      <script>
        $("#menu-toggle").click(function(e) {
          e.preventDefault();
          $("#wrapper").toggleClass("toggled");
        });
      </script>


</body>
</html>