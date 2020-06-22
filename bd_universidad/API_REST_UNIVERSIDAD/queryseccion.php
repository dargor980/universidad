

<?php
    header("Content-Type: text/html;charset=UTF-8");
    include 'conection.php';
    $con=connect();
    $email= $_SESSION['email'];
    $seccion=$_SESSION['cod_section'];
        $query=mysqli_query($con,"SELECT e.rut, e.apellido, e.nombre FROM ESTUDIANTE e, ESTADO_CURSO ec WHERE e.rut=ec.cod_estudiante AND ec.cod_seccion=$seccion") or
            die("Query error: ".mysqli_error($con));
        $contador=1;
        ?>
        <div class="container-fluid">
            <div class="container lista-estudiantes">
                <h4 class="border-bottom border-white">Listado de Estudiantes</h4>
            </div>              
            <table class="table table-stripped table-dark table-hover">
                <thead>
                    <tr>
                        <th scope="col">Rut</th>
                        <th scope="col">Apellidos</th>
                        <th scope="col">Nombre</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        while($res=mysqli_fetch_array($query))
                        {?>
                            <tr>
                            <th scope="col"><?php echo $res['rut']; ?></th>
                            <th scope="col"><?php echo $res['apellido']; ?> </th>
                            <th scope="col"><?php echo $res['nombre']; ?></th>
                            </tr> <?php
                        }?>
                </tbody>
             </table>                    
        </div>

        <div class="container d-flex justify-content-end">
            <span><a href="details_section.php?section=<?php echo $_SESSION['section'];?>&cod_section=<?php echo $_SESSION['cod_section'];?>"><img src="static/img/back_arrow.png" alt="" style="widht: 37px; height: 37px;" > volver</a></span>
        </div>
          