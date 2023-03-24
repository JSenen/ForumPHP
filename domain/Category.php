<?php
/* Clase CATEGORY. Realiza las distintas funciones asociadas a la tabla ctegories de la base de datos */
class Category
{
  public String $cat_name;
  public String $cat_description;
  public int $cat_id;
  public PDO $dbh;
  public function __construct(){
     
  }
  
  public function getOneCategory($id, $dbh){  //Funcion buscar una categoria
    try {
      //configuramos la consulta a la base de datos
      //Evitamos la inyeccion de SQL por medio de marcadores de posición y bindParam
      //Seleccionamos los datos que nos interesan
      $stmt = $dbh->prepare("SELECT cat_name, cat_description FROM categories WHERE cat_id = :id");
      $stmt->bindParam(':id', $id, PDO::PARAM_INT);
      $stmt->execute();
      $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
      

    } catch (PDOException $e) {
      echo "ERROR: " . $e->getMessage();
    }
    return $resultado;

  }
  public function getCategories($dbh,$id){      //Función obtiene listado completo de categorias
      try{
        $stmt = $dbh->prepare("SELECT cat_id, cat_name, cat_description FROM categories");
        $stmt->execute();
        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;
      } catch (PDOException $e) {
        echo "ERROR: " . $e->getMessage();
    }
   
  }

  public function addCategory($cat_name, $cat_description, $dbh){            //Función añadir categoria
    try {
      $sql = "INSERT INTO categories (cat_name, cat_description) VALUES (:cat_name,:cat_description)";
      $stmt = $dbh->prepare($sql);
      $stmt->bindParam(':cat_name', $cat_name, PDO::PARAM_STR);
      $stmt->bindParam(':cat_description', $cat_description, PDO::PARAM_STR);
      $stmt->execute();
  } catch (PDOException $e) {
      echo "ERROR: " . $e->getMessage();
  }

  }

  public function modyCategory($dbh,$cat_name,$cat_description,$id){       //Función modificar categorias
    try {
      //configuramos el prepared statement
      $stmt = $dbh->prepare("UPDATE categories SET cat_name = :cat_name, cat_description = :cat_description WHERE cat_id = :id");
      $stmt->bindParam(':cat_name', $cat_name, PDO::PARAM_STR);
      $stmt->bindParam(':cat_description', $cat_description, PDO::PARAM_STR);
      $stmt->bindParam(':id', $id, PDO::PARAM_STR);
      $stmt->execute();
  } catch (PDOException $e) {
      echo "ERROR: " . $e->getMessage();
  }

  }

}


?>