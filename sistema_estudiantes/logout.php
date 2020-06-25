<?php
    session_start();

    unset($_SESSION['email']);

    session_destroy();

    header("Location: ../docentes_login.php");

?>