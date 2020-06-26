<?php

    session_start();
    $email= $_POST['user'];
    $password= $_POST['password'];
    //sql conection

    $servername= "localhost";
    $userDatabase ="root";
    $passwordDatabase ="";
    $database= "UNIVERSIDAD";

    $con = mysqli_connect($servername,$userDatabase,$passwordDatabase,$database) or
        die("Error en la conexión a la base de datos");

    $registro = mysqli_query($con, "SELECT *FROM CREDENCIAL WHERE usuario='$email' AND contrasena='$password'") or
        die("Query error: " .mysqli_error($con));

    if($reg=mysqli_fetch_array($registro)){
        $_SESSION['email']= $email;
        header("Location: panel_docentes.php");
    }
    else{
        echo "El email o password es incorrecto";
    }

?>