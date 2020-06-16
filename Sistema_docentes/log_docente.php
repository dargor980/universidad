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

<<<<<<< HEAD
    $registro = mysqli_query($con, "SELECT *FROM CREDENCIAL WHERE usuario='$email' AND contrasena='$password'") or
=======
    $registro = mysqli_query($con, "SELECT *FROM credencial WHERE ") or
>>>>>>> 56ec2f025eb332756dc05c2310701e5d4eba3d83
        die("Query error: " .mysqli_error($con));

    if($reg=mysqli_fetch_array($registro)){
        $_SESSION['email']= $email;
<<<<<<< HEAD
        header("Location: panel_docentes.html");
=======
        header("Location: ");
>>>>>>> 56ec2f025eb332756dc05c2310701e5d4eba3d83
    }
    else{
        echo "El email o password es incorrecto";
    }

?>