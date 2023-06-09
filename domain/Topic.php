<?php
/* Clase TOPIC. Realiza las distintas funciones asociadas a la tabla temas (topics) de la base de datos */
//require_once('./model/utils.php');
class Topic
{
  public int $topic_id;
  public string $topic_subject;
  public int $topic_cat;
  public int $topic_by;
  public PDO $dbh;
  public function __construct()
  {

  }
  function fixdate($date)
  {
    //Funcion que nos permite modificar el formato de la fecha 
    return date('d-m-Y', strtotime($date));
  }

  function redirect(string $location)
  //función para redirigir a la pagina que interesa según el id que no encuentre
  {
    header('Location: view/' . $location); // Redirige a la página  
    exit;
  }

  public function getOneTopic($id, $dbh)
  { //Funcion buscar una categoria
    try {
      //configuramos la consulta a la base de datos
      //Evitamos la inyeccion de SQL por medio de marcadores de posición y bindParam
      //Seleccionamos los datos que nos interesan
      $stmt = $dbh->prepare("SELECT topic_subject, topic_cat FROM topics WHERE topic_id = :id");
      $stmt->bindParam(':id', $id, PDO::PARAM_INT);
      $stmt->execute();
      $temas = $stmt->fetchAll(PDO::FETCH_ASSOC);
      if (!$temas) { // Si no existe 
        redirect('classnofound_view.php');
      }

    } catch (PDOException $e) {
      echo "ERROR: " . $e->getMessage();
      redirect('errorpagePDO_view.php');
    }
    return $temas;

  }
  public function getTopics($dbh, $cat_id)
  { //Función obtiene listado completo de temas
    try {
      $stmt = $dbh->prepare("SELECT topic_id, topic_subject, topic_by FROM topics WHERE topic_cat = :id ");
      $stmt->bindParam(":id", $cat_id, PDO::PARAM_INT);
      $stmt->execute();
      $temas = $stmt->fetchAll(PDO::FETCH_ASSOC);
      if (!$temas) { // Si no existe 
        header('indexAddTopic.php');
      }
      return $temas;
    } catch (PDOException $e) {
      echo "ERROR: " . $e->getMessage();
      redirect('errorpagePDO_view.php');
    }

  }

  public function addOneTopic($topic_subject, $topic_cat, $topic_by, $dbh)
  { //Función añadir tema
    try {
      $sql = "INSERT INTO topics (topic_subject, topic_cat, topic_by) VALUES (:topic_subject, :topic_cat, :topic_by)";
      $stmt = $dbh->prepare($sql);
      $stmt->bindParam(':topic_subject', $topic_subject, PDO::PARAM_STR);
      $stmt->bindParam(':topic_cat', $topic_cat, PDO::PARAM_INT);
      $stmt->bindParam(':topic_by', $topic_by, PDO::PARAM_INT);
      $stmt->execute();
      echo "LO HE GRABADO";
    } catch (PDOException $e) {
      echo "ERROR: " . $e->getMessage();
      redirect('errorpagePDO_view.php');
    }

  }

  public function modyTopic($dbh, $topic_subject, $id)
  { //Función modificar tema
    try {
      //configuramos el prepared statement
      $stmt = $dbh->prepare("UPDATE topics SET topic_subject = :topic_subject WHERE topic_id = :id");
      $stmt->bindParam(':topic_subject', $topic_subject, PDO::PARAM_STR);
      $stmt->bindParam(':id', $id, PDO::PARAM_INT);
      $stmt->execute();
    } catch (PDOException $e) {
      echo "ERROR: " . $e->getMessage();
      redirect('errorpagePDO_view.php');
    }

  }
  public function deleteTopic($dbh, $id)
  { //Funcion eliminar
    try {
      $stmt = $dbh->prepare('DELETE FROM topics WHERE topic_id=:id');
      $stmt->bindParam(':id', $id, PDO::PARAM_STR);
      $stmt->execute();
    } catch (PDOException $e) {
      echo "ERROR: " . $e->getMessage();
      redirect('errorpagePDO_view.php');
    }
  }

}


?>