<?php

function delCategory($id,$dbh){
/*comprobamos si la variable "id" está configurada en la
URL, y comprobamos que es válida */
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    // obtener el valor de ID mediante el método GET
        $id = $_GET['id'];
    // eliminamos la entrada
        try {
            $stmt = $dbh->prepare('DELETE FROM categories WHERE cat_id=:id');
            $stmt->bindParam(':id', $_GET['id'], PDO::PARAM_STR);
            $stmt->execute();
        } catch (PDOException $e) {
            echo "ERROR: " . $e->getMessage();
        }
    // redirigimos de vuelta a la p�gina de vista principal
        
    } else /* Si el ID no está configurado, o no es válido, volvemos
    a la página principal*/ {
     
    }

}

  ?>