<?php
function modCat($dbh, $id, $resultado)
{
  //Recibimos la conexión desde el controller y las categorias

  //Pasamos el resultado al formulario
  foreach ($resultado as $category) {
    $cat_name = $category['cat_name'];
    $cat_description = $category['cat_description'];
    require('./view/modcategory_view.php'); //Pasamos los datos a la vista del formulario
  }
  // Procesamo el formulario y guardamos los datos en la BD.
  if (isset($_POST['modcategory'])) {

    $cat_name = htmlspecialchars($_POST['cat_name']);
    $cat_description = htmlspecialchars($_POST['cat_description']);
    // guardamos los datos en la base de datos
    $category = new Category();
    $category->modyCategory($dbh, $cat_name, $cat_description, $id);

    //una vez guardados, redirigimos a la p�gina principal
    header("Location: indexCategory.php");

  }
}