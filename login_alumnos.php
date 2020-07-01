<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--bootstrap-->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <!--css-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="static/css/login.css">
    <title>Inicio</title>
    <?php
        session_start();
        if(isset($_SESSION['estudiante']))
        {
            header("Location: sistema_estudiantes/panel_estudiantes.php");
        }
        ?>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-md-4 fsection" id="login_section">
                <div class="row row-logo">
                    <div class="col-xs-12 col-md-6  logo">
                        <img src="static/img/logo_wolf_blanco.ico" alt="" class="border-right border-white">
                    </div>
                    <div class="col-xs-12 col-md-6 logo2">
                        <h4>Universidad Rexel</h4>
                        <p>Acceso estudiantes</p> 
                    </div>
                    
                </div>
                <div class="card">
                    <div class="card-header">
                        <h3>Inicio de sesión</h3>
                    </div>
                    <div class="card-body">
                        <form action="sistema_estudiantes/log_estudiante.php" method="post">
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>

                                </div>
                                <input type="text" class="form-control" placeholder="Usuario" name="user">
                            </div>

                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                                </div>
                                <input type="password" class="form-control" placeholder="Contraseña" name="password">
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Ingresar" class="btn float-right btn-primary">
                            </div>
                        </form>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-center">
                            <a href="">He olvidado mi contraseña</a>
                        </div>
                    </div>
                        
                </div>
                
            </div>

            <div class="col-xs-12 col-md-8">
            </div>
        </div>
    </div>
  
      
    <!-- JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
<script>
        $(document).ready(function(){
        var height=$(window).height();
        $('#login_section').height(height);
    });

    $(document).ready(function(){
        window.onresize=funcion_cambia;
        function funcion_cambia(){
            var height=$(window).height();
        $('#login_section').height(height);
        }
        
    });
</script>
<br>
<br>

</html>