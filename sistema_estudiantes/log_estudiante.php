<?php
    include '../bd_universidad/API_REST_UNIVERSIDAD/conection.php';
   
    $con=connect_estudiantes();
    $email=$_POST['user'];
    $password=$_POST['password'];
    $query=mysqli_query($con,"SELECT *FROM CREDENCIAL WHERE usuario='$email' AND contrasena='$password' AND cod_profesor is null") or
        die("Query error: ".mysqli_error($con));
    if($result=mysqli_fetch_array($query))
    {
        $_SESSION['estudiante']=$email;
        header("Location: panel_estudiantes.php");
    }
    else{
        echo "usuario y/o contraseña incorrecto(s)";
    }
?>