<?php

function addNewTopic($dbh,$id){
  if (isset($_POST['addtopic'])) {
    // Obtenemos los datos del formulario, asegur�ndonos que son v�lidos.
    $topic_subject= htmlspecialchars($_POST['topic_subject']);
    $topic_cat = $id; //Asociamos el tema a la categoria
    $topic_by = $_SESSION['user_id']; //Asociamos a la id de usuario registrado;
// Comprueba que ambos campos han sido introducidos
      if ($topic_subject == '') {
// Genera el mensaje de error
          $error = 'ERROR: Por favor, introduce todos los campos requeridos.!';
      
      } else {
// guardamos los datos en la base de datos
          try {
              $sql = "INSERT INTO topics (topic_subject, topic_cat, topic_by) VALUES (:topic_subject, :topic_cat, :topic_by)";
              $stmt = $dbh->prepare($sql);
              $stmt->bindParam(':topic_subject', $_POST['topic_subject'], PDO::PARAM_STR);
              $stmt->bindParam(':topic_cat', $topic_cat, PDO::PARAM_INT);
              $stmt->bindParam(':topic_by', $topic_by, PDO::PARAM_INT);
              $stmt->execute();
          } catch (PDOException $e) {
              echo "ERROR: " . $e->getMessage();
          }
          header("location: indexTopics.php?id=".$topic_cat);
      }
  }

}
?>
