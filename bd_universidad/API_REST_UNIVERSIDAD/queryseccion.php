

<?php
    header("Content-Type: text/html;charset=UTF-8");
    include 'conection.php';
    $con=connect();
    $email= $_SESSION['email'];
    $seccion=$_GET['section'];

        $query=mysqli_query($con,"SELECT e.rut, e.apellido, e.nombre FROM ESTUDIANTE e, ESTADO_CURSO ec WHERE e.rut=ec.cod_estudiante AND ec.cod_seccion=$seccion") or
            die("Query error: ".mysqli_error($con));
        $contador=1;
        
        while($res=mysqli_fetch_array($query))
        {
            $rut=  utf8_decode($res['rut']);
            $apellido= utf8_decode($res['apellido']);
            echo $rut;
            echo " ".$apellido;
            echo " ".$res['nombre'];
            echo "<br>";
        }
   
?>