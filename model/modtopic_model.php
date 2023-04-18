<?php
function modTop($dbh, $id, $temas){
      //Recibimos la conexión desde el controller y los temas
      //Pasamos el resultado al formulario
      foreach ($temas as $topic) 
               { 
                $topic_subject = $topic['topic_subject'];
                $topic_cat = $topic['topic_cat'];
                require('./view/modtopic_view.php'); //Pasamos los datos a la vista del formulario
               } 
  // Procesamo el formulario y guardamos los datos en la BD.
  if (isset($_POST['modtopic'])) {

          $topic_subject = htmlspecialchars($_POST['topic_subject']);
     
  // guardamos los datos en la base de datos
          $topic = new Topic();
          $topic->modyTopic($dbh, $topic_subject, $id);
          //una vez guardados, redirigimos a la p�gina principal
          header("Location: indexTopics.php?id=".$topic_cat);
              
  }
}

