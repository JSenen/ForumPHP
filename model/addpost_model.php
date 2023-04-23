<?php
//Recibomos el $id del tema al que corresponde y la conexion
function addNewPost($dbh,$post_topic){
  if (isset($_POST['addpost'])) {
    // Obtenemos los datos del formulario, aseguramos que no estan vacios
    $post_content= htmlspecialchars($_POST['post_content']);
    $post_by = $_SESSION['user_id']; //Asociamos a la id de usuario registrado
    // Comprueba el campo ha sido introducido.
      if ($post_content == '') {
        // Genera el mensaje de error
          $error = 'ERROR: Por favor, introduce todos los campos requeridos.!';
      
      } else {
        // guardamos los datos en la base de datos
        $comentario = new Post();
        try {
        $comentario->addOnePost($post_content, $post_topic, $post_by, $dbh);
                  //Nos devuelve a la página de comentarios con la id del tema
                  header("location: indexPost.php?id=".$post_topic);
        }catch (Exception $e){
          // Manejar la excepción 
        echo 'Ha ocurrido un error: ' . $e->getMessage();
        }
        
      }
  }

}
?>
