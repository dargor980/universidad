<!--para conectar a la base de datos se debe editar los variables
    de la funcion connect().
    $serverName: dirección donde aloja la base de datos
    $userDatabase: nombre de usuario por el cual se conectara a la base de datos mysql
    $passwordDatabase: contraseña del usuario.
    $database: Nombre de la base de datos a la que se conectara.
-->

<?php
    $email= $_SESSION['email'];
    $conexion;
    function connect(){   
        $serverName= "localhost";
        $userDatabase ="root";
        $passwordDatabase="";
        $database= "UNIVERSIDAD";

        $con= mysqli_connect($serverName,$userDatabase,$passwordDatabase,$database) or
            die("Error en la conexión en la base de Datos");
        return $con;
    }
    
?>