<?php

function addNewCategory($dbh)
{

  if (isset($_POST['addcategory'])) {
    // Obtenemos los datos del formulario, asegur�ndonos que son v�lidos.
    $cat_name = htmlspecialchars($_POST['cat_name']);
    $cat_description = htmlspecialchars($_POST['cat_description']);
    // Comprueba que ambos campos han sido introducidos
    if ($cat_name == '' || $cat_description == '') {
      // Genera el mensaje de error
      $error = 'ERROR: Por favor, introduce todos los campos requeridos.!';

    } else {
      // guardamos los datos en la base de datos
//Creamos un objeto categoria
      $category = new Category();
      try {
        $category->addCategory($cat_name, $cat_description, $dbh);
        header('Location: ./indexCategory.php');
      } catch (Exception $e) {
        // Manejar la excepción aquí
        echo 'Ha ocurrido un error: ' . $e->getMessage();
      }

    }
  }

}
?>