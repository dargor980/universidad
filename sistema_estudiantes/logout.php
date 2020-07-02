<?php
    session_start();

    unset($_SESSION['estudiante']);

    session_destroy();

    header("Location: ../login_alumnos.php");

?>