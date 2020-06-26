
$.ajax(
    {
        url: '../bd_universidad/API_REST_UNIVERSIDAD/queryseccion.php?section=<?php echo $section; ?>',
        success: function(data)
        {
            $(document).ready(function(){  
                $("#alumnos").click(function(event){
                $("#contenido-principal").load('../bd_universidad/API_REST_UNIVERSIDAD/queryseccion.php');
            });
            });
        }
    }
)


