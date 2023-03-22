<?php
function modCat($dbh,$id){
  //Recibimos la conexión desde el controller
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
      //Pasamos el resultado
      foreach ($resultado as $category) 
               { 
                $cat_name = $category['cat_name'];
                $cat_description = $category['cat_description'];
               ?>
               <main class="container admin" id="content">
    <form action="" method="post" class="narrow">
      <h1>Modificar Categoria</h1>
      
      <div class="form-group">
        <label for="name">Categoria: </label>
        <input type="text" name="cat_name" value="<?php echo $cat_name ?>" class="form-control">
      </div>

      <div class="form-group">
        <label for="description">Descripción: </label>
        <textarea name="cat_description"  value="<?php echo $cat_description ?>"
                  class="form-control"></textarea>
      </div>
      <input type="submit" value="Grabar" name="modcategory" class="btn btn-primary btn-save">
    </form>
  </main>
  <?php
               } 
  // Procesamo el formulario y guardamos los datos en la BD.
  if (isset($_POST['modcategory'])) {

          $cat_name = htmlspecialchars($_POST['cat_name']);
          $cat_description = htmlspecialchars($_POST['cat_description']);

  // guardamos los datos en la base de datos
          try {
              //configuramos el prepared statement
              $stmt = $dbh->prepare("UPDATE categories SET cat_name = :cat_name, cat_description = :cat_description WHERE id = :id");
              $stmt->bindParam(':cat_name', $cat_name, PDO::PARAM_STR);
              $stmt->bindParam(':cat_description', $cat_description, PDO::PARAM_STR);
              $stmt->bindParam(':id', $id, PDO::PARAM_STR);
              $stmt->execute();
          } catch (PDOException $e) {
              echo "ERROR: " . $e->getMessage();
          }
          //una vez guardados, redirigimos a la p�gina principal
          header("Location: indexCategory.php");
              
  }
}

