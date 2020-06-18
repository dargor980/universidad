<?php                      
   function request_seccion() :void {
    $email= $_SESSION['email'];
    $servername= "localhost";
    $userDatabase ="root";
    $passwordDatabase ="";
    $database= "UNIVERSIDAD";
                        
    $con= mysqli_connect($servername,$userDatabase,$passwordDatabase,$database) or
        die("Error en la conexión en la base de datos");
                        
    $registro = mysqli_query($con, "SELECT s.cod_seccion, a.nombre FROM SECCION s, PROFESOR p, ASIGNATURA a
        WHERE s.cod_profesor=p.rut AND s.cod_asignatura=a.cod_asignatura
        AND s.cod_profesor=(SELECT c.cod_profesor FROM CREDENCIAL c, PROFESOR p WHERE c.cod_profesor=p.rut AND c.usuario='$email')") or
                die("Query error: " .mysqli_error($con));
    $contador=1;

    while($reg=mysqli_fetch_array($registro)){ ?>
        <tr>
            <th scope="col"><?php echo $contador ?></th>
            <th scope="col" class="font-weight-light" id="col"><a href="details_section.php?section=<?php echo $reg['nombre'] ?>"><?php echo $reg['nombre'] ?></a></th>
            <th scope="col" class="font-weight-light"><?php echo $reg['cod_seccion'] ?></th>
            <th scope="col" class="font-weight-light">
                <?php
                    $seccion=$reg['cod_seccion'];
                    $query_alumnos = mysqli_query($con, "SELECT COUNT(*) FROM ESTADO_CURSO ec WHERE ec.cod_seccion=$seccion") or
                        die("Query error: " .mysqli_error($con));
                    if($resultado=mysqli_fetch_array($query_alumnos))
                    {
                        echo $resultado['COUNT(*)'];
                    }
                ?>
            </th>
            <th scope="col" class="font-weight-light">23 may 00:40</th>
        </tr>
    <?php
        $contador=$contador+1;
 }}
?>              
    