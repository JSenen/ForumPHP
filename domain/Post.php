<?php
/* Clase POST. Realiza las distintas funciones asociadas a la tabla comentarios(posts) de la base de datos */
//require_once('./model/utils.php');
class Post
{
  public int $post_id;
  public String $post_content;
  public int $post_topic;
  public int $post_by;
  public PDO $dbh;
  public function __construct(){
     
  }
  function fixdate($date) {
    //Funcion que nos permite modificar el formato de la fecha 
    return date('d-m-Y', strtotime($date));
  }
  
  function redirect(string $location)
  //función para redirigir a la pagina que interesa según el id que no encuentre
  {
      header('Location: view/' . $location);        // Redirige a la página  
      exit;                                                          
  }
  
  public function getOnePost($post_id, $dbh){  //Funcion buscar un comentario
    try {
    
      $stmt = $dbh->prepare("SELECT post_content, post_topic, post_by FROM posts WHERE post_id = :id");
      $stmt->bindParam(':id', $post_id, PDO::PARAM_INT);
      $stmt->execute();
      $comentario = $stmt->fetchAll(PDO::FETCH_ASSOC);
      if (!$comentario) {                                     // Si no existe 
        redirect('classnofound_view.php'); 
      }

    } catch (PDOException $e) {
      echo "ERROR: " . $e->getMessage();
      redirect('errorpagePDO_view.php'); 
    }
    return $comentario;

  }
  public function getPosts($dbh,$topic_id){      //Función obtiene listado completo de comentarios
      try{
        $stmt = $dbh->prepare("SELECT post_id, post_content, post_date, post_by FROM posts WHERE post_topic = :id ORDER BY post_date ASC" );
        $stmt->bindParam(":id", $topic_id, PDO::PARAM_INT);
        $stmt->execute();
        $comentarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (!$comentarios) {                                     // Si no existe 
          header('indexAddPost.php'); 
        }
        return $comentarios;
      } catch (PDOException $e) {
        echo "ERROR: " . $e->getMessage();
        redirect('errorpagePDO_view.php'); 
    }
   
  }

  public function addOnePost($post_content, $post_topic, $post_by, $dbh){            //Función añadir comentario
    try {
      $sql = "INSERT INTO posts (post_content, post_topic, post_by) VALUES (:post_content, :post_topic, :post_by )";
              $stmt = $dbh->prepare($sql);
              $stmt->bindParam(':post_content', $post_content, PDO::PARAM_STR);
              $stmt->bindParam(':post_topic', $post_topic, PDO::PARAM_INT);
              $stmt->bindParam(':post_by', $post_by, PDO::PARAM_INT);
              $stmt->execute();
  } catch (PDOException $e) {
      echo "ERROR: " . $e->getMessage();
      redirect('errorpagePDO_view.php'); 
  }

  }

  public function modyPost($dbh,$post_content,$post_id){       //Función modificar comentario
    try {
      //configuramos el prepared statement
      $stmt = $dbh->prepare("UPDATE posts SET post_content = :post_content WHERE post_id = :post_id");
      $stmt->bindParam(':post_content', $post_content, PDO::PARAM_STR);
      $stmt->bindParam(':post_id',$post_id,PDO::PARAM_INT);
      $stmt->execute();
  } catch (PDOException $e) {
      echo "ERROR: " . $e->getMessage();
      redirect('errorpagePDO_view.php'); 
  }

  }

  public function deletePost($dbh,$id){
    try {
      $stmt = $dbh->prepare('DELETE FROM posts WHERE post_id=:id');
      $stmt->bindParam(':id', $id, PDO::PARAM_STR);
      $stmt->execute();
  } catch (PDOException $e) {
      echo "ERROR: " . $e->getMessage();
      redirect('errorpagePDO_view.php'); 
  }
  }

}


?>