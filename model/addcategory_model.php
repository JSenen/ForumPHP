<?php

function addNewCategory($dbh){

  if (isset($_POST['addcategory'])) {
    // Obtenemos los datos del formulario, asegur�ndonos que son v�lidos.
    $cat_name= htmlspecialchars($_POST['cat_name']);
    $cat_description = htmlspecialchars($_POST['cat_description']);
// Comprueba que ambos campos han sido introducidos
      if ($cat_name == '' || $cat_description == '') {
// Genera el mensaje de error
          $error = 'ERROR: Por favor, introduce todos los campos requeridos.!';
      
      } else {
// guardamos los datos en la base de datos
          try {
              $sql = "INSERT INTO categories (cat_name, cat_description) VALUES (:cat_name,:cat_description)";
              $stmt = $dbh->prepare($sql);
              $stmt->bindParam(':cat_name', $_POST['cat_name'], PDO::PARAM_STR);
              $stmt->bindParam(':cat_description', $_POST['cat_description'], PDO::PARAM_STR);
              $stmt->execute();
          } catch (PDOException $e) {
              echo "ERROR: " . $e->getMessage();
          }
          header('Location: ./indexCategory.php');
      }
  }

}
?>

