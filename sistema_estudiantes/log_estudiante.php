<?php
    include '../bd_universidad/API_REST_UNIVERSIDAD/conection.php';
    if(isset($_SESSION['email']))
    {
        header("Location: ../index.html");
    }
    else{
        session_start();
        $con=connect();
        $email=$_POST['user'];
        $password=$_POST['password'];
        $query=mysqli_query($con,"SELECT *FROM CREDENCIAL WHERE usuario='$email' AND contrasena='$password'") or
            die("Query error: ".mysqli_error($con));
        if($result=mysqli_fetch_array($query))
        {
            $_SESSION['email']=$email;
            header("Location: panel_estudiantes.php");
        }
        else{
            echo "usuario y/o contraseña incorrecto(s)";
        }

    }



?>