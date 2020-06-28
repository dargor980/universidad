<?php
    include '../bd_universidad/API_REST_UNIVERSIDAD/conection.php';
    session_start();
    $email= $_POST['user'];
    $password= $_POST['password'];
    //sql conection

    $con=connect();

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