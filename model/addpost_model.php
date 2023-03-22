<?php
//Recibomos el $id del tema al que corresponde y la conexion
function addNewPost($dbh,$id){
  if (isset($_POST['addpost'])) {
    // Obtenemos los datos del formulario, aseguramos que no estan vacios
    $post_content= htmlspecialchars($_POST['post_content']);
    $post_topic = $id; //Asociamos el comentario al tema
    $post_by = $_SESSION['user_id']; //Asociamos a la id de usuario registrado
// Comprueba el campo ha sido introducido.
      if ($post_content == '') {
// Genera el mensaje de error
          $error = 'ERROR: Por favor, introduce todos los campos requeridos.!';
      
      } else {
// guardamos los datos en la base de datos
          try {
              $sql = "INSERT INTO posts (post_content, post_topic, post_by) VALUES (:post_content, :post_topic, :post_by )";
              $stmt = $dbh->prepare($sql);
              $stmt->bindParam(':post_content', $post_content, PDO::PARAM_STR);
              $stmt->bindParam(':post_topic', $post_topic, PDO::PARAM_INT);
              $stmt->bindParam(':post_by', $post_by, PDO::PARAM_INT);
              $stmt->execute();
          } catch (PDOException $e) {
              echo "ERROR: " . $e->getMessage();
          }
          //Nos devuelve a la página de comentarios con la id de la categoria
          header("location: indexPost.php?id=".$post_topic);
      }
  }

}
?>
