var seccion = "<?php echo $section ?>";

$(document).ready(function(){  
    $("#alumnos").click(function(event){
    $("#contenido-principal").load('../bd_universidad/API_REST_UNIVERSIDAD/queryseccion.php');
  });
});

