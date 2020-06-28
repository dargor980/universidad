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
            mysqli_close($con);
            return $result['ruta_foto_perfil'];
        }      
        mysqli_close($con);
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
            mysqli_close($con);
        }
        else
        {
            mysqli_close($con);
        }
    }


    function uploadImagenPerfilDocente():void 
    {

        copy($_FILES['foto']['tmp_name'],$_FILES['foto']['name']);
        echo "la foto se registro en el servidor";
        $nom = $_FILES['foto']['name'];
        $ruta_destino="/sistema_universidad/Sistema_docentes/static/img/profile/";
        $carpeta_destino=$_SERVER['DOCUMENT_ROOT'].$ruta_destino;
        move_uploaded_file($_FILES['foto']['tmp_name'],$carpeta_destino.$nom);
        $rut=getRutProfesor();
        $ruta_acceso="static/img/profile/".$nom;
        $con=connect();
        mysqli_query($con,"UPDATE PROFESOR SET ruta_foto_perfil='$ruta_acceso' WHERE rut='$rut[rut]'") or
            die("Error to try update: ".mysqli_error($con));
        mysqli_close($con);
        unlink($nom);  
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
            mysqli_query($con,"INSERT INTO CREDENCIAL (cod_credencial,cod_estudiante,usuario,contrasena) VALUES ('$cod_credencial','$rut','$user','$password')") or 
                die("Error until upload data to database: ".mysqli_error($con));
        }else{
            mysqli_query($con,"INSERT INTO ESTUDIANTE (rut,nombre,apellido,fecha_nacimiento,correo,estado) VALUES ('$rut','$name','$lastName','$bornDate','$correo',$status)") or
                die("Error until upload data to database: ".mysqli_error($con));
            mysqli_query($con,"INSERT INTO CREDENCIAL (cod_credencial,cod_estudiante,usuario,contrasena) VALUES ('$cod_credencial','$rut','$user','$password')") or 
                die("Error until upload data to database: ".mysqli_error($con));
            mysqli_close($con);
        }
        
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
            mysqli_close($con);
        }else{
            mysqli_query($con,"INSERT INTO SECCION (cod_seccion,cod_asignatura,anio_semestre) VALUES('$cod_seccion','$cod_asignatura','$anio_semestre')") or
                die("Error until upload data to database: ".mysqli_error($con));
            mysqli_close($con);
        }
    }

    function addAsignatura():void 
    {
        
        $cod_asignatura=$_POST['cod_asignatura'];
        $nombre=$_POST['asignatura'];
        if(!isAsignaturaExists())
        {
            $con=connect();
            mysqli_query($con,"INSERT INTO ASIGNATURA (cod_asignatura,nombre) VALUES('$cod_asignatura','$nombre')") or
                die("Error to try insert: ".mysqli_error($con));
            mysqli_close($con);

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
        mysqli_close($con);

    }

    function addCredencial():void 
    {

    }
    function addMatricula():void
    {
        $con=connect();
        $rut=$_POST['rut'];
        $cod_carrera=$_POST['cod_carrera'];
        $year=$_POST['year'];
        mysqli_query($con,"INSERT INTO MATRICULA (cod_estudiante,cod_carrera,anio) VALUES('$rut','$cod_carrera','$year'))") or
            die("Error until upload data to database: ".mysqli_error($con));
        mysqli_close($con);

    }

    function AddEstudianteToSeccion():void 
    {
        $con=connect();
        $cod_seccion=$_POST['cod_section'];
        $rut=getRutEstudiante();
        mysqli_query($con,"INSERT INTO ESTADO_CURSO (cod_estudiante,cod_seccion,asistencia) VALUES('$rut[rut]',$cod_seccion,1)") or
            die("Error to try upload: ".mysqli_error($con));
        mysqli_close($con);
    }

    function DeleteDocente():void
    {
        $con=connect();
        $rut=$_POST['rut'];
        if(!DocenteIsInAnySeccion())
        {
            mysqli_query($con,"DELETE FROM PROFESOR WHERE rut='$rut'") or
                die("Error to try delete: ".mysqli_error($con));
            mysqli_close($con);

        }
    }

    function DeleteEstudiante():void
    {
        $rut=$_POST['rut'];
        if(estudianteIsInAnySeccion())
        {
            deleteEstudianteOfAllSeccions();
            $con=connect();
            mysqli_query($con,"DELETE FROM ESTUDIANTE WHERE rut='$rut'") or
                die("Error to try delete: ".mysqli_error($con));
            
        }else{
            $con=connect();
            mysqli_query($con,"DELETE FROM ESTUDIANTE WHERE rut='$rut'") or
                die("Error to try delete: ".mysqli_error($con));

        }
        mysqli_close($con);
        
    }

    function DeleteSeccion():void 
    {
        $cod_seccion=$_POST['cod_seccion'];
        $con=connect();
        $mysqli_query($con,"DELETE FROM SECCION WHERE cod_seccion=$cod_seccion") or
            die("Error to try delete: ".mysqli_error($con));
        mysqli_close($con);
    }

    function deleteEstudianteOfSeccion():void
    {
        $rut=$_POST['rut'];
        $cod_seccion=$_POST['cod_seccion'];
        $con=connect();
        mysqli_query($con,"DELETE FROM ESTADO_CURSO WHERE cod_estudiante='$rut' AND cod_seccion=$cod_seccion") or
            die("Error to try delete: ".mysqli_error($con));
        mysqli_close($con);
    }

    function deleteEstudianteOfAllSeccions():void 
    {
        $rut=$_POST['rut'];
        $con=connect();
        mysqli_query("$con","DELETE FROM ESTADO_CURSO WHERE cod_estudiante='$rut'") or
            die("Error to try delete: ".mysqli_error($con));
        mysqli_close($con);
    }

    function getHorarioDocente():void
    {


    }

    function getHorarioEstudiante():void 
    {

    }
    
    function getAvanceDeMalla():void 
    {

    }

    
    function getMallaCurricular()
    {

        
    }

    function getAsignatura()
    {
        $con=connect();
        $cod_asignatura=$_POST['cod_asignatura'];
        $query=mysqli_query($con,"SELECT *FROM ASIGNATURA WHERE cod_asignatura='$cod_asignatura'") or
            die("Query error: ".mysqli_error($con));
        if($result=mysqli_fetch_array($query))
        {
            mysqli_close($con);
            return result;
        }
    }

    function getMatriculaEstudiante()
    {
        $con=connect();
        $rut=$_POST['rut'];
        $query=mysqli_query($con,"SELECT *FROM MATRICULA WHERE cod_estudiante='$rut[rut]'") or
            die("Query error: ".mysqli_error($con));
        if($result=mysqli_fetch_array($query))
        {
            return $result;
        }
    }

    function getRutProfesor()
    {
        $user=$_SESSION['email'];
        $con=connect();
        $query=mysqli_query($con,"SELECT p.rut FROM PROFESOR p, CREDENCIAL c WHERE p.rut=c.cod_profesor AND c.usuario='$user'") or
            die("Query Error: ".mysqli_error($con));
        if($reg=mysqli_fetch_array($query))
        {
            mysqli_close($con);
            return $reg;
        }
    }

    function getRutEstudiante()
    {
        $user=$_SESSION['email'];
        $con=connect();
        $query=mysqli_query($con,"SELECT e.rut FROM ESTUDIANTE e, CREDENCIAL c WHERE e.rut=c.cod_estudiante AND c.usuario='$user'") or
            die("Query error: ".mysqli_error($con));
        if($reg=mysqli_fetch_array($query))
        {
            mysqli_close($con);
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
            mysqli_close($con);
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
            mysqli_close($con);
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
            mysqli_close($con);
            return true;
        }else{
            mysqli_close($con);
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
            mysqli_close($con);
            return true;
        }else{
            mysqli_close($con);
            return false;
        }
    }

    function isSeccionExists()
    {
        $con=connect();
        $cod_seccion=$_POST['cod_seccion'];
        $query=mysqli_query($con,"SELECT *FROM SECCION WHERE cod_seccion=$cod_seccion") or
            die("Query error: ".mysqli_error($con));
        if($result=mysqli_fetch_array($query)){
            mysqli_close($con);
            return true;
        }else{
            mysqli_close($con);
            return false;
        }

    }

    function isAsignaturaExists()
    {
        $con=connect();
        $asignatura=$_POST['asignatura'];
        $query=mysqli_query($con,"SELECT cod_asignatura FROM ASIGNATURA WHERE nombre='$asignatura'") or 
            die("Query error: ".mysqli_error($con));
        if($result=mysqli_fetch_array($query))
        {
            mysqli_close($con);
            return true;
        }else{
            mysqli_close($con);
            return false;
        }
    }

    function updateTelefonoEstudiante():void
    {
        $rut=$_POST['rut'];
        $phone=$_POST['phone'];
        $con=connect();
        mysqli_query($con,"UPDATE ESTUDIANTE SET telefono='$phone' WHERE rut='$rut'") or
            die("Error to try update: ".mysqli_error($con));
        mysqli_close($con);
    }

    function updateCorreoEstudiante():void 
    {
        $rut=$_POST['rut'];
        $correo=$_POST['correo'];
        $con=connect();
        mysqli_query($con,"UPDATE ESTUDIANTE SET correo='$correo' WHERE rut='$rut'") or
            die("Error to try update: ".mysqli_error($con));
        mysqli_close($con);
    }

    function updateComunaEstudiante():void
    {
        $rut=$_POST['rut'];
        $comuna=$_POST['comuna'];
        $con=connect();
        mysqli_query($con,"UPDATE ESTUDIANTE SET comuna='$comuna' WHERE rut='$rut'") or
            die("Error to try update: ".mysqli_error($con));
        mysqli_close($con);
    }
    function updateDireccionEstudiante():void 
    {
        $rut=$_POST['rut'];
        $address=$_POST['address'];
        $con=connect();
        mysqli_query($con,"UPDATE ESTUDIANTE SET direccion='$address' WHERE rut='$rut'") or 
            die("Error to try update: ".mysqli_error($con));
        mysqli_close($con);
    }

    function updateCorreoDocente():void 
    {
        $rut=getRutProfesor();
        $correo=$_POST['correo'];
        $con=connect();
        mysqli_query($con,"UPDATE PROFESOR SET correo='$correo' WHERE rut='$rut[rut]'") or 
            die("Error to try update: ".mysqli_error($con));
        mysqli_close($con);
    }

    function updateComunaDocente():void 
    {
        $rut=getRutProfesor();
        $comuna=$_POST['comuna'];
        $con=connect();
        mysqli_query($con,"UPDATE PROFESOR SET comuna='$comuna' WHERE rut='$rut[rut]'") or 
            die("Error to try update: ".mysqli_error($con));
        mysqli_close($con);

    }

    function updateDireccionDocente():void 
    {
        $rut=getRutProfesor();
        $address=$_POST['address'];
        $con=connect();
        mysqli_query($con,"UPDATE PROFESOR SET direccion='$address' WHERE rut='$rut[rut]'") or
            die("Error to try update: ".mysqli_error($con));
        mysqli_close($con);
    }

    function estudianteIsInSeccion()
    {
        $con=connect();
        $seccion=$_POST['cod_seccion'];
        $rut=getRutEstudiante();
        $query=mysqli_query($con,"SELECT *FROM ESTADO_CURSO WHERE cod_estudiante='$rut[rut]' AND cod_seccion=$cod_seccion") or
            die("Query error: ".mysqli_error($con));
        if($result=mysqli_fetch_array($query))
        {
            mysqli_close($con);
            return true;
        }else{
            mysqli_close($con);
            return false;
        }
    }

    function estudianteIsInAnySeccion()
    {
        $con=connect();
        $rut=$_POST['rut'];
        $query=mysqli_query($con,"SELECT *FROM ESTADO_CURSO WHERE cod_estudiante='$rut'") or
            die("Query Error: ".mysqli_error($con));
        if($result=mysqli_fetch_array($query))
        {
            mysqli_close($con);
            return true;
        }else{
            mysqli_close($con);
            return false;
        }
    }

    function DocenteIsInAnySeccion()
    {
        $con=connect();
        $rut=$_POST['rut'];
        $query=mysqli_query($con,"SELECT *FROM SECCION WHERE cod_profesor='$rut'") or 
            die("Query Error: ".mysql_error($con));
        if($result=mysqli_fetch_array($query))
        {
            mysqli_close($con);
            return true;
        }
        else{
            mysqli_close($con);
            return false;
        }
    }

    function updateEstadoEstudiante():void
    {
        $rut=$_POST['rut'];
        $con=connect();
        $status=$_POST['status'];
        mysqli_query($con,"UPDATE ESTUDIANTE SET cod_estado=$status WHERE rut='$rut'") or
            die("Error to try update: ".mysqli_error($con));
        mysqli_close($con);
    } 
    function isEstudianteMatriculado()
    {
        $rut=$_POST['rut'];
        $cod_carrera=$_POST['cod_carrera'];
        $con=connect();
        $anio=date("L");
        $query=mysqli_query($con,"SELECT *FROM MATRICULA WHERE cod_estudiante='$rut' AND cod_carrera='$cod_carrera' AND YEAR(anio)=$anio") Or 
            die("Query error: ".mysqli_error($con));
        if($result=mysqli_fetch_array($query))
        {
            mysqli_close($con);
            return true;
        }else
        {
            mysqli_close($con);
            return false;
        }
    }
    function inscribirEstudianteCarrera():void
    {
        if(!isEstudianteMatriculado())
        {
            $con=connect();
            $rut=$_POST['rut'];
            $cod_carrera=$_POST['cod_carrera'];
            $fecha_ingreso=date();
            mysqli_query($con,"INSERT INTO INSCRITO (cod_estudiante,cod_carrera,semestre_inicio) VALUES('$rut','$cod_carrera','$fecha_ingreso')") or 
                die("Error to try insert: ".mysqli_error($con));
        }
        

    }

    function getPlanDeEstudios():void
    {

    }



    if(isset($_FILES['foto'])){
        uploadImagenPerfilDocente();
    }

    

?>

