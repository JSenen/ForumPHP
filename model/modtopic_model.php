<?php
function modTop($dbh,$id){
  //Recibimos la conexión desde el controller y la id del tema
  try {
      //configuramos la consulta a la base de datos
      //Evitamos la inyeccion de SQL por medio de marcadores de posición y bindParam
      //Seleccionamos los datos que nos interesan
      $stmt = $dbh->prepare("SELECT topic_subject, topic_cat FROM topics WHERE topic_id = :id");
      $stmt->bindParam(':id', $id, PDO::PARAM_INT);
      $stmt->execute();
      $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
      

    } catch (PDOException $e) {
      echo "ERROR: " . $e->getMessage();
    }
      //Pasamos el resultado al formulario
      foreach ($resultado as $topic) 
               { 
                $topic_subject = $topic['topic_subject'];
                $topic_cat = $topic['topic_cat'];
                require('./view/modtopic_view.php'); //Pasamos los datos a la vista del formulario
               } 
  // Procesamo el formulario y guardamos los datos en la BD.
  if (isset($_POST['modtopic'])) {

          $subject = htmlspecialchars($_POST['topic_subject']);
     
  // guardamos los datos en la base de datos
          try {
              //configuramos el prepared statement
              $stmt = $dbh->prepare("UPDATE topics SET topic_subject = :topic_subject WHERE topic_id = :id");
              $stmt->bindParam(':topic_subject', $subject, PDO::PARAM_STR);
              $stmt->bindParam(':id',$id,PDO::PARAM_INT);
              $stmt->execute();
          } catch (PDOException $e) {
              echo "ERROR: " . $e->getMessage();
          }
          //una vez guardados, redirigimos a la p�gina principal
          header("Location: indexTopics.php?id=".$topic_cat);
              
  }
}

