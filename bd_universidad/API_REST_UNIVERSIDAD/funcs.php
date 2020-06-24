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

    function UpdateImagenPerfilDocente():void 
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
        $phone=$_POST['phone'];
        $comuna=$_POST['comuna'];
        $address=$_POST['address'];
        $password=$_POST['password'];
        $cod_credencial=$_POST['cod_credencial'];
        if(isset($_POST['ruta']))
        {
            mysqli_query($con,"INSERT INTO DOCENTE (rut, nombre, apellido, correo,ruta_foto_perfil,telefono,comuna,direccion) VALUES('$rut','$name','$lastName','$correo','$ruta','$phone','$comuna','$address')") or
                die("Error until upload data to database: ".mysqli_error($con));
        }else{
            mysqli_query($con,"INSERT INTO DOCENTE (rut, nombre, apellido, correo,telefono,comuna,direccion) VALUES('$rut','$name','$lastName','$correo','$phone','$comuna','$address')") or
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
        $cod_seccion=$_POST['cod_seccion'];      
        $cod_asignatura=$_POST['cod_asignatura'];
        $anio_semestre=$_POST['anio_semestre'];
        if(isset($cod_profesor))
        {
            $cod_profesor=$_POST['cod_profesor'];
            mysqli_query($con,"INSERT INTO SECCION (cod_seccion,cod_profesor,cod_asignatura,anio_semestre) VALUES('$cod_seccion','$cod_profesor','$cod_asignatura','$anio_semestre')") or
                die("Error until upload data to database: ".mysqli_error($con));
        }else{
            mysqli_query($con,"INSERT INTO SECCION (cod_seccion,cod_asignatura,anio_semestre) VALUES('$cod_seccion','$cod_asignatura','$anio_semestre')") or
                die("Error until upload data to database: ".mysqli_error($con));
        }
    }

    function addCarrera():void
    {
        $con=connect();
        $cod_carrera=$_POST['cod_carrera'];
        $name=$_POST['name'];
        $semestres=$_POST['semestres'];
        mysqli_query($con,"INSERT INTO CARRERA (cod_carrera,nombre,semestres) VALUES('$cod_carrera','$name',$semestres)") or
            die("Error until upload data to database: ".mysqli_error($con));

    }

    function addMatricula():void
    {
        $con=connect();
        $rut=$_POST['rut'];
        $cod_carrera=$_POST['cod_carrera'];
        $year=$_POST['year'];
        mysqli_query($con,"INSERT INTO MATRICULA (cod_estudiante,cod_carrera,anio) VALUES('$rut','$cod_carrera','$year'))") or
            die("Error until upload data to database: ".mysqli_error($con));

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

    function getRutProfesor()
    {
        $user=$_SESSION['email'];
        $con=connect();
        $query=mysqli_query($con,"SELECT p.rut FROM PROFESOR p, CREDENCIAL c WHERE p.rut=c.cod_profesor AND c.usuario='$user'") or
            die("Query Error: ".mysqli_error($con));
        if($reg=mysqli_fetch_array($query))
        {
            return $reg;
        }
    }

    function GetDocente()
    {
        $con=connect();
        $rut=getRutProfesor();
        $query=mysqli_query($con,"SELECT *FROM PROFESOR WHERE rut='$rut[rut]'") or
            die("Query Error: ".mysqli_error($con));
        if($reg=mysqli_fetch_array($query))
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

    function isSeccionExists()
    {

    }

    function isAsignaturaExists()
    {

    }

    function updateDocente():void
    {

    }

    function updateEstudiante():void
    {

    }

    function estudianteIsInSeccion()
    {
        $con=connect();
        
    }
?>