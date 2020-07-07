<!--para conectar a la base de datos se debe editar los variables
    de la funcion connect().
    $serverName: dirección donde aloja la base de datos
    $userDatabase: nombre de usuario por el cual se conectara a la base de datos mysql
    $passwordDatabase: contraseña del usuario.
    $database: Nombre de la base de datos a la que se conectara.
-->

<?php
    
    
    function connect(){ 
        if(isset($_SESSION['email']))
        {
            $email=$_SESSION['email'];
        }
        else
        {
            session_start();
            $email= $_SESSION['email'];
        }  
        $serverName= "localhost";
        $userDatabase ="root";
        $passwordDatabase="";
        $database= "UNIVERSIDAD";
        $conexion;
        $con= mysqli_connect($serverName,$userDatabase,$passwordDatabase,$database) or
            die("Error en la conexión en la base de Datos");
        return $con;
    }

    function connect_estudiantes(){
        if(isset($_SESSION['estudiante']))
        {
            $email=$_SESSION['estudiante'];
        }
        else
        {
            session_start();
            if(isset($_SESSION['estudiante']))
            {
                $email= $_SESSION['estudiante'];

            }
            
        }
        $serverName= "localhost";
        $userDatabase ="root";
        $passwordDatabase="";
        $database= "UNIVERSIDAD";
        $conexion;
        $con= mysqli_connect($serverName,$userDatabase,$passwordDatabase,$database) or
            die("Error en la conexión en la base de Datos");
        return $con;
    }

    function connect_administracion()
    {
        if(isset($_SESSION['administracion']))
        {
            $email=$_SESSION['administracion'];
        }
        else
        {
            session_start();
            if(isset($_SESSION['administracion']))
            {
                $email= $_SESSION['administracion'];
            }
        }
        $serverName= "localhost";
        $userDatabase ="root";
        $passwordDatabase="";
        $database= "UNIVERSIDAD";
        $conexion;
        $con=mysqli_connect($serverName,$userDatabase,$passwordDatabase,$database) or
            die("Error en la conexion en la base de Datos");
        return $con;
    }
    
?>