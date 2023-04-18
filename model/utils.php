<?php
function fixdate($date) {
  //Funcion que nos permite modificar el formato de la fecha 
  return date('d-m-Y', strtotime($date));
}

function redirect(string $location)
//función para redirigir a la pagina que interesa según el id que no encuentre
{
    header('Location: view/' . $location);        // Redirige a la página  
    exit;                                                          
}

?>