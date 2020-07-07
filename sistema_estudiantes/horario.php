<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Horario | Plataforma de gestión académica Rexel</title>
    <link rel="shortcut icon" href="static/img/logo_wolf.ico" class="icon-pestaña">
    <!--Bootstrap-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <!--Font awesome--> 
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <!--css-->

    <link rel="stylesheet" href="static/css/panel.css">
    <!-- JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</head>
<body>
  <?php
    include '../bd_universidad/API_REST_UNIVERSIDAD/funcs.php';
    session_start();
    if(isset($_SESSION['estudiante']))
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
          <div class="sidebar-heading text-light"><span><?php  $ruta=showImagenPerfilEstudiante(); echo "<img src=\"$ruta\" style=\"width:40px; height:40px; border-radius: 50%;\">"; ?></span>  Estudiante</div>
          <div class="list-group list-group-flush">
            <a href="inbox.php" class="list-group-item list-group-item-action bg-dangeri text-light text-sidebar border-white"><img src="static/img/email.svg" style="width: 14px;height: 20px;"> Correo</a>
            <a href="profile.php" class="list-group-item list-group-item-action bg-dangeri text-light text-sidebar border-white"><i class="fas fa-user"></i> Perfil</a>
            <a href="#datosAcademicos" class="list-group-item list-group-item-action bg-dangeri text-light text-sidebar border-white" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="datosAcademicos"><i class="fas fa-book"></i> Datos académicos</a>
            <div class="collapse datosAcademicos border-warning sec" id="datosAcademicos">
                <div class="container">
                    <div class="container-fluid">
                    <br>
                        <ul class="border-left border-white docs text-sidebar">
                            <li class="docs"><a href="calificaciones.php">Mis calificaciones</a> </li>
                            <li class="docs"><a href="avance_malla.php">Avance de Malla</a> </li>
                            <li class="docs"><a href="malla_curricular.php">Malla curricular</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <a href="horario.php" class="list-group-item list-group-item-action bg-dangeri text-light text-sidebar border-white"><i class="far fa-calendar-alt"></i> Horario</a>
            <a href="aranceles.php" class="list-group-item list-group-item-action bg-dangeri text-light text-sidebar border-white"><i class="fas fa-dollar-sign"></i> Aranceles</a>
            <a href="#collapseExample" class="list-group-item list-group-item-action bg-dangeri text-light text-sidebar border-white" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseExample"><i class="fas fa-file-alt"></i> Documentos</a>
            <div class="collapse datosAcademicos border-warning sec" id="collapseExample">
            <div class="container-fluid">
                <div class="container">
                    <br>
                    <ul class="border-left border-white docs text-sidebar">
                        <li class="docs"><a href="">Certificados</a></li>
                        <li class="docs"><a href="">Notificar licencia médica</a></li>
                        <li class="docs"><a href="">Contratos matrícula</a></li>
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
                  <a class="nav-link text-light" href="panel_estudiantes.php">Inicio <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Usuario
                  </a>
                  <div class="dropdown-menu dropdown-menu-right bg-dangeri" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item text-light" href="#">Action</a>
                    <a class="dropdown-item text-light" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-light" href="logout.php">Cerrar sesión</a>
                  </div>
                </li>
              </ul>
            </div>
          </nav>  
          <div class="container">
            <div class="container backa">
                <h4 class="mt-4 border-bottom border-white">
                  Horario Estudiante
                </h4>

                <div class="container horario table-responsive">
                  <table class="table table-stripped table-dark tabla-horario">
                    <thead>
                      <tr>
                        <th scope="col">Código asignatura</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Profesor</th>
                        <th scope="col">Sección</th>
                      </tr>
                    </thead>
                    <tbody class="table-danger">
                      <?php
                        getTableAsignaturasEstudiante();
                      ?>               
                    </tbody>
                  </table>
                </div>
                <div class="container horario table-responsive">
                  <?php
                  $horario[]=getHorarioEstudiante();
                  ?>
                  <table class="table table-stripped table-dark tabla-horario">
                    <thead>
                      <tr>
                        <th scope="col">Período</th>
                        <th scope="col">Bloque</th>
                        <th scope="col">Lunes</th>
                        <th scope="col">Martes</th>
                        <th scope="col">Miércoles</th>
                        <th scope="col">Jueves</th>
                        <th scope="col">Viernes</th>
                        <th scope="col">Sábado</th>
                      </tr>
                    </thead>
                    <tbody class="table-danger">
                      <tr>
                        <th scope="col" class="border-right border-bottom border-secondary font-weight-light text-dark campo text-center">1</th>
                        <th scope="col" class="border-right border-bottom border-secondary font-weight-light text-dark campo">8:00-9:30</th>
                        <th scope="col" class="border-right border-bottom border-secondary font-weight-light text-dark campo text-center"><?php printHorario("Lunes",1,$horario); ?></th>
                        <th scope="col" class="border-right border-bottom border-secondary font-weight-light text-dark campo text-center"><?php printHorario("Martes",1,$horario); ?></th>
                        <th scope="col" class="border-right border-bottom border-secondary font-weight-light text-dark campo text-center"><?php printHorario("Miercoles",1,$horario); ?></th>
                        <th scope="col" class="border-right border-bottom border-secondary font-weight-light text-dark campo text-center"><?php printHorario("Jueves",1,$horario); ?></th>
                        <th scope="col" class="border-right border-bottom border-secondary font-weight-light text-dark campo text-center"><?php printHorario("Viernes",1,$horario); ?></th>
                        <th scope="col" class="border-right border-bottom border-secondary font-weight-light text-dark campo text-center"><?php printHorario("Sabado",1,$horario); ?></th>
                      </tr>


                      <tr>
                        <th scope="col" class="border-right border-bottom border-secondary font-weight-light text-dark campo text-center">2</th>
                        <th scope="col" class="border-right border-bottom border-secondary font-weight-light text-dark campo">9:40-11:10</th>
                        <th scope="col" class="border-right border-bottom border-secondary font-weight-light text-dark campo text-center"><?php printHorario("Lunes",2,$horario);?></th>
                        <th scope="col" class="border-right border-bottom border-secondary font-weight-light text-dark campo text-center"><?php printHorario("Martes",2,$horario);?></th>
                        <th scope="col" class="border-right border-bottom border-secondary font-weight-light text-dark campo text-center"><?php printHorario("Miercoles",2,$horario);?></th>
                        <th scope="col" class="border-right border-bottom border-secondary font-weight-light text-dark campo text-center"><?php printHorario("Jueves",2,$horario);?></th>
                        <th scope="col" class="border-right border-bottom border-secondary font-weight-light text-dark campo text-center"><?php printHorario("Viernes",2,$horario);?></th>
                        <th scope="col" class="border-right border-bottom border-secondary font-weight-light text-dark campo text-center"><?php printHorario("Sabado",2,$horario);?></th>
                      </tr>



                      <tr>
                        <th scope="col" class="border-right border-bottom border-secondary font-weight-light text-dark campo text-center">3</th>
                        <th scope="col" class="border-right border-bottom border-secondary font-weight-light text-dark campo">11:20-12:50</th>
                        <th scope="col" class="border-right border-bottom border-secondary font-weight-light text-dark campo text-center"><?php printHorario("Lunes",3,$horario); ?></th>
                        <th scope="col" class="border-right border-bottom border-secondary font-weight-light text-dark campo text-center"><?php printHorario("Martes",3,$horario); ?></th>
                        <th scope="col" class="border-right border-bottom border-secondary font-weight-light text-dark campo text-center"><?php printHorario("Miercoles",3,$horario);?></th>
                        <th scope="col" class="border-right border-bottom border-secondary font-weight-light text-dark campo text-center"><?php printHorario("Jueves",3,$horario); ?></th>
                        <th scope="col" class="border-right border-bottom border-secondary font-weight-light text-dark campo text-center"><?php printHorario("Viernes",3,$horario); ?></th>
                        <th scope="col" class="border-right border-bottom border-secondary font-weight-light text-dark campo text-center"><?php printHorario("Sabado",3,$horario); ?></th>
                      </tr>


                      <tr>
                        <th scope="col" class="border-right border-bottom border-secondary font-weight-light text-dark campo text-center">4</th>
                        <th scope="col" class="border-right border-bottom border-secondary font-weight-light text-dark campo">13:00-14:30</th>
                        <th scope="col" class="border-right border-bottom border-secondary font-weight-light text-dark campo text-center"><?php printHorario("Lunes",4,$horario); ?></th>
                        <th scope="col" class="border-right border-bottom border-secondary font-weight-light text-dark campo text-center"><?php printHorario("Martes",4,$horario); ?></th>
                        <th scope="col" class="border-right border-bottom border-secondary font-weight-light text-dark campo text-center"><?php printHorario("Miercoles",4,$horario); ?></th>
                        <th scope="col" class="border-right border-bottom border-secondary font-weight-light text-dark campo text-center"><?php printHorario("Jueves",4,$horario); ?></th>
                        <th scope="col" class="border-right border-bottom border-secondary font-weight-light text-dark campo text-center"><?php printHorario("Viernes",4,$horario); ?></th>
                        <th scope="col" class="border-right border-bottom border-secondary font-weight-light text-dark campo text-center"><?php printHorario("Sabado",4,$horario); ?></th>
                      </tr>


                      <tr>
                        <th scope="col" class="border-right border-bottom border-secondary font-weight-light text-dark campo text-center">5</th>
                        <th scope="col" class="border-right border-bottom border-secondary font-weight-light text-dark campo ">14:40-16:10</th>
                        <th scope="col" class="border-right border-bottom border-secondary font-weight-light text-dark campo text-center"><?php printHorario("Lunes",5,$horario); ?></th>
                        <th scope="col" class="border-right border-bottom border-secondary font-weight-light text-dark campo text-center"><?php printHorario("Martes",5,$horario); ?></th>
                        <th scope="col" class="border-right border-bottom border-secondary font-weight-light text-dark campo text-center"><?php printHorario("Miercoles",5,$horario); ?></th>
                        <th scope="col" class="border-right border-bottom border-secondary font-weight-light text-dark campo text-center"><?php printHorario("Jueves",5,$horario); ?> </th>
                        <th scope="col" class="border-right border-bottom border-secondary font-weight-light text-dark campo text-center"><?php printHorario("Viernes",5,$horario); ?></th>
                        <th scope="col" class="border-right border-bottom border-secondary font-weight-light text-dark campo text-center"><?php printHorario("Sabado",5,$horario); ?></th>
                      </tr>


                      <tr>
                        <th scope="col" class="border-right border-bottom border-secondary font-weight-light text-dark campo text-center">6</th>
                        <th scope="col" class="border-right border-bottom border-secondary font-weight-light text-dark campo">16:20-17:50</th>
                        <th scope="col" class="border-right border-bottom border-secondary font-weight-light text-dark campo text-center"><?php printHorario("Lunes",6,$horario); ?></th>
                        <th scope="col" class="border-right border-bottom border-secondary font-weight-light text-dark campo text-center"><?php printHorario("Martes",6,$horario); ?></th>
                        <th scope="col" class="border-right border-bottom border-secondary font-weight-light text-dark campo text-center"><?php printHorario("Miercoles",6,$horario); ?></th>
                        <th scope="col" class="border-right border-bottom border-secondary font-weight-light text-dark campo text-center"><?php printHorario("Jueves",6,$horario); ?></th>
                        <th scope="col" class="border-right border-bottom border-secondary font-weight-light text-dark campo text-center"><?php printHorario("Viernes",6,$horario); ?></th>
                        <th scope="col" class="border-right border-bottom border-secondary font-weight-light text-dark campo text-center"><?php printHorario("Sabado",6,$horario); ?></th>
                      </tr>


                      <tr>
                        <th scope="col" class="border-right border-bottom border-secondary font-weight-light text-dark campo text-center">7</th>
                        <th scope="col" class="border-right border-bottom border-secondary font-weight-light text-dark campo">18:00-19:30</th>
                        <th scope="col" class="border-right border-bottom border-secondary font-weight-light text-dark campo text-center"><?php printHorario("Lunes",7,$horario); ?></th>
                        <th scope="col" class="border-right border-bottom border-secondary font-weight-light text-dark campo text-center"><?php printHorario("Martes",7,$horario); ?></th>
                        <th scope="col" class="border-right border-bottom border-secondary font-weight-light text-dark campo text-center"><?php printHorario("Miercoles",7,$horario); ?></th>
                        <th scope="col" class="border-right border-bottom border-secondary font-weight-light text-dark campo text-center"><?php printHorario("Jueves",7,$horario); ?></th>
                        <th scope="col" class="border-right border-bottom border-secondary font-weight-light text-dark campo text-center"><?php printHorario("Viernes",7,$horario); ?></th>
                        <th scope="col" class="border-right border-bottom border-secondary font-weight-light text-dark campo text-center"><?php printHorario("Sabado",7,$horario); ?></th>
                      </tr>

                      <tr>
                        <th scope="col" class="border-right border-bottom border-secondary font-weight-light text-dark campo text-center">8</th>
                        <th scope="col" class="border-right border-bottom border-secondary font-weight-light text-dark campo">19:40-21:10</th>
                        <th scope="col" class="border-right border-bottom border-secondary font-weight-light text-dark campo text-center"><?php printHorario("Lunes",8,$horario); ?></th>
                        <th scope="col" class="border-right border-bottom border-secondary font-weight-light text-dark campo text-center"><?php printHorario("Martes",8,$horario); ?></th>
                        <th scope="col" class="border-right border-bottom border-secondary font-weight-light text-dark campo text-center"><?php printHorario("Miercoles",8,$horario); ?></th>
                        <th scope="col" class="border-right border-bottom border-secondary font-weight-light text-dark campo text-center"><?php printHorario("Jueves",8,$horario); ?></th>
                        <th scope="col" class="border-right border-bottom border-secondary font-weight-light text-dark campo text-center"><?php printHorario("Viernes",8,$horario); ?></th>
                        <th scope="col" class="border-right border-bottom border-secondary font-weight-light text-dark campo text-center"><?php printHorario("Sabado",8,$horario); ?></th>
                      </tr>

                      <tr>
                        <th scope="col" class="border-right border-bottom border-secondary font-weight-light text-dark campo text-center">9</th>
                        <th scope="col" class="border-right border-bottom border-secondary font-weight-light text-dark campo">21:20-22:30</th>
                        <th scope="col" class="border-right border-bottom border-secondary font-weight-light text-dark campo text-center"><?php printHorario("Lunes",9,$horario); ?></th>
                        <th scope="col" class="border-right border-bottom border-secondary font-weight-light text-dark campo text-center"><?php printHorario("Martes",9,$horario); ?></th>
                        <th scope="col" class="border-right border-bottom border-secondary font-weight-light text-dark campo text-center"><?php printHorario("Miercoles",9,$horario); ?></th>
                        <th scope="col" class="border-right border-bottom border-secondary font-weight-light text-dark campo text-center"><?php printHorario("Jueves",9,$horario); ?></th>
                        <th scope="col" class="border-right border-bottom border-secondary font-weight-light text-dark campo text-center"><?php printHorario("Viernes",9,$horario); ?></th>
                        <th scope="col" class="border-right border-bottom border-secondary font-weight-light text-dark campo text-center"><?php printHorario("Sabado",9,$horario); ?></th>
                      </tr>
                    </tbody>
                  </table>
                </div>
            </div>
            
              
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