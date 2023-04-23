<?php

function addNewTopic($dbh,$topic_cat){

  if (isset($_POST['addtopic'])) {
    // Obtenemos los datos del formulario, asegur�ndonos que son v�lidos.
    $topic_subject= htmlspecialchars($_POST['topic_subject']);
    $topic_by = $_SESSION['user_id']; //Asociamos a la id de usuario registrado;
    // Comprueba que los campos han sido introducidos
      if ($topic_subject == '') {
        // Genera el mensaje de error
          $error = 'ERROR: Por favor, introduce todos los campos requeridos.!';
      
      } else {
        $tema = new Topic();
        try{
          $tema->addOneTopic($topic_subject, $topic_cat, $topic_by, $dbh);
        // guardamos los datos en la base de dato
        
        header("location: indexTopics.php?id=".$topic_cat);
        }catch (Exception $e){
          //Control de la excepcion
          echo 'Ha ocurrido un error'.$e->getMessage();
        }
        
      }
      
  }

}
?>
