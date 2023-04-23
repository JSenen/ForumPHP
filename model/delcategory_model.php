<?php

function delCategory($dbh){
/*comprobamos si la variable "id" está configurada en la
URL, y comprobamos que es válida */
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    // obtener el valor de ID mediante el método GET
        $id = $_GET['id'];
    // eliminamos la entrada
        $category = new Category();
        try {
            $category->deleteCategory($dbh,$id);
        } catch (Exception $e){
            echo 'Se ha producido un error'.$e->getMessage();
        }
       
    // redirigimos de vuelta a la p�gina de vista principal
        
    } else /* Si el ID no está configurado, o no es válido, volvemos
    a la página principal*/ {
     
    }

}

  ?>