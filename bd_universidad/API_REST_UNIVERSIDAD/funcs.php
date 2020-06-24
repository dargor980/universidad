<?php
    include 'conection.php';

    function showImagenPerfilDocente()
    {
        $con=connect();
        $email=$_SESSION['email'];
        $query=mysqli_query($con,"SELECT p.ruta_foto_perfil FROM PROFESOR p, CREDENCIAL c WHERE p.rut=c.cod_profesor AND c.usuario='$email'") or
            die("Query error: ".mysqli_error($con));
        if($result=mysqli_fetch_array($query))
        {
            return $result['ruta_foto_perfil'];
        }
        else
        {
            echo "error";
        }
    }

    function showImagenPerfilEstudiante():void
    {
        $con=connect();
        $email=$_SESSION['email'];
        $query=mysqli_query($con,"SELECT e.foto_perfil FROM ESTUDIANTE e, CREDENCIAL c WHERE c.cod_estudiante=e.rut AND c.usuario='lala@lala.com'");
        if($result=mysqli_fetch_assoc($query))
        {
            $imgDatos=mysqli_fetch_assoc($query);
            header("Content-Type: image/png");
            echo $imgDatos['foto_perfil'];
        }
        else
        {
        }
    }

    function UploadImagenPerfilDocente():void 
    {
       
    } 

    function AddDocente():void
    {
        $con=connect();
        $rut=$_POST['rut'];
        $name=$_POST['name'];
        $lastName=$_POST['lastName'];
        $correo=$_POST['email'];
        $ruta=$_POST['ruta'];
        $user=$_POST['user'];
        $password=$_POST['password'];
        $cod_credencial=$_POST['cod_credencial'];
        if(isset($_POST['ruta']))
        {
            mysqli_query($con,"INSERT INTO DOCENTE (rut, nombre, apellido, correo,ruta_foto_perfil) VALUES('$rut','$name','$lastName','$correo','$ruta')") or
                die("Error until upload data to database: ".mysqli_error($con));

        }else{
            mysqli_query($con,"INSERT INTO DOCENTE (rut, nombre, apellido, correo) VALUES('$rut','$name','$lastName','$correo')") or
                die("Error until upload data to database: ".mysqli_error($con));

        }
        mysqli_query($con,"INSERT INTO CREDENCIAL (cod_credencial,cod_profesor,usuario,contrasena) VALUES('$cod_credencial','$rut','$user','$password')") or 
                die("Error until upload data to database: ".mysqli_error($con));        
    }

    function AddEstudiante():void
    {
        $con=connect();
        $rut=$_POST['rut'];
        $name=$_POST['name'];
        $lastName=$_POST['lastName'];
        $bornDate=$_POST['fecha_nacimiento'];
        $correo=$_POST['email'];
        $status=1;
        $user=$_POST['user'];
        $password=$_POST['password'];
        $cod_credencial=$_POST['cod_credencial'];
        if(isset($_POST['ruta']))
        {      
            $ruta=$_POST['ruta'];
            mysqli_query($con,"INSERT INTO ESTUDIANTE (rut,nombre,apellido,fecha_nacimiento,correo,estado,ruta_archivo) VALUES ('$rut','$name','$lastName','$bornDate','$correo',$status,'$ruta')") or
                die("Error until upload data to database: ".mysqli_error($con));
        }else{
            mysqli_query($con,"INSERT INTO ESTUDIANTE (rut,nombre,apellido,fecha_nacimiento,correo,estado) VALUES ('$rut','$name','$lastName','$bornDate','$correo',$status)") or
                die("Error until upload data to database: ".mysqli_error($con));

        }
        mysqli_query($con,"INSERT INTO CREDENCIAL (cod_credencial,cod_estudiante,usuario,contrasena) VALUES ('$cod_credencial','$rut','$user','$password')") or 
            die("Error until upload data to database: ".mysqli_error($con));
    }

    function AddSeccion():void
    {
        $con=connect();

    }

    function AddEstudianteToSeccion():void 
    {

    }

    function DeleteDocente():void
    {

    }

    function DeleteEstudiante():void
    {

    }

    function DeleteSeccion():void 
    {

    }

    function DeleteEstudianteToSeccion():void
    {

    }

    function GetHorarioDocente():void
    {

    }

    function GetHorarioEstudiante():void 
    {

    }

    function GetDocente()
    {
        $con=connect();
        $rut=$_POST['rut'];
        $query=mysqli_query($con,"SELECT *FROM PROFESOR WHERE rut='$rut'") or
            die("Query Error: ".mysqli_error($con));
        if($reg=mysqli_fetch_array($con))
        {
            return $reg;
        }
    }
    function GetEstudiante()
    {
        $con=connect();
        $rut=$_POST['rut'];
        $query=mysqli_query($con,"SELECT *FROM ESTUDIANTE WHERE rut='$rut'") or
            die("Query Error: ".mysqli_error($con));
        if($reg=mysqli_fetch_array($query))
        {
            return $reg;
        }

    }
    function isDocenteExists()
    {
        $rut=$_POST['rut'];
        $con=connect();
        $query=mysqli_query($con,"SELECT *FROM PROFESOR WHERE rut='$rut'") or 
            die("Query error: ".mysqli_error($con));
        if($reg=mysqli_fetch_array($query))
        {
            return true;
        }else{
            return false;
        }
    }

    function isEstudianteExists()
    {
        $rut=$_POST['rut'];
        $con=connect();
        $query=mysqli_query($con,"SELECT *FROM ESTUDIANTE WHERE rut='$rut'") or
            die("Query Error: ".mysqli_error($con));
        if($reg=mysqli_fetch_array($query))
        {
            return true;
        }else{
            return false;
        }
    }

?>