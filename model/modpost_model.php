<?php
function modyPost($dbh,$id){
  //Recibimos la conexión desde el controller y la id del comentario
  try {
      //configuramos la consulta a la base de datos
      //Evitamos la inyeccion de SQL por medio de marcadores de posición y bindParam
      //Seleccionamos los datos que nos interesan
      $stmt = $dbh->prepare("SELECT post_content, post_topic, post_id FROM posts WHERE post_id = :id");
      $stmt->bindParam(':id', $id, PDO::PARAM_INT);
      $stmt->execute();
      $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
      

    } catch (PDOException $e) {
      echo "ERROR: " . $e->getMessage();
    }
      //Pasamos el resultado al formulario
      foreach ($resultado as $post) 
               { 
                $post_content = $post['post_content'];
                $post_topic = $post['post_topic'];
                $post_id = $post['post_id'];
                require('./view/modpost_view.php'); //Pasamos los datos a la vista del formulario
               } 
  // Procesamo el formulario y guardamos los datos en la BD.
  if (isset($_POST['modifpost'])) {

          $subject = htmlspecialchars($_POST['post_content']);
     
  // guardamos los datos en la base de datos
          try {
              //configuramos el prepared statement
              $stmt = $dbh->prepare("UPDATE posts SET post_content = :post_content WHERE post_id = :post_id");
              $stmt->bindParam(':post_content', $subject, PDO::PARAM_STR);
              $stmt->bindParam(':post_id',$post_id,PDO::PARAM_INT);
              $stmt->execute();
          } catch (PDOException $e) {
              echo "ERROR: " . $e->getMessage();
          }
          //una vez guardados, redirigimos a la página principal
          header("Location: indexPost.php?id=".$post_topic);
              
  }
}
