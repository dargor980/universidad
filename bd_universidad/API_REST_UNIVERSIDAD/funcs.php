<?php
    include 'conection.php';

    function showImagenPerfilDocente():void
    {
        $con=connect();
        $email=$_SESSION['email'];
        $query=mysqli_query($con,"SELECT p.foto_perfil FROM PROFESOR p, CREDENCIAL c, WHERE c.cod_profesor=p.rut AND c.usuario='$email'");
        if($result=mysqli_fetch_array($query))
        {
            $imgDatos=$result;
            header("Content-Type: image/jpg");
            echo $imgDatos['foto_perfil'];
        }
        else
        {
        }
    }

    function showImagenPerfilEstudiante():void
    {
        $con=connect();
        $email=$_SESSION['email'];
        $query=mysqli_query($con,"SELECT e.foto_perfil FROM ESTUDIANTE e, CREDENCIAL c, WHERE c.cod_estudianter=e.rut AND c.usuario='$email'");
        if($result=mysqli_fetch_array($query))
        {
            $imgDatos=$result;
            header("Content-Type: image/jpg");
            echo $imgDatos['foto_perfil'];
        }
        else
        {
        }
    }

    function UploadImagenPerfilDocente():void 
    {
        if(isset($_POST["submit"]))
        {
            $revisar = getimagesize($_FILES["image"]["tmp-name"]);
            if($revisar !=false)
            {
                $image= $_FILES['image']['tmp_name'];
                $imgContent = addslashes(file_get_contents($image));
                $con= connect();

            }
        }
    }

?>