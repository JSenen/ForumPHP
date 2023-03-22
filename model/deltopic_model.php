<?php

function delTopic($id,$dbh){
/*comprobamos si la variable "id" está configurada en la
URL, y comprobamos que es válida */
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    // obtener el valor de ID mediante el método GET
        $id = $_GET['id'];
    // eliminamos la entrada
        try {
            $stmt = $dbh->prepare('DELETE FROM topics WHERE topic_id=:id');
            $stmt->bindParam(':id', $_GET['id'], PDO::PARAM_STR);
            $stmt->execute();
        } catch (PDOException $e) {
            echo "ERROR: " . $e->getMessage();
        }

    
    } 
    header("location: indexCategory.php");

}

  ?>