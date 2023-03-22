<?php
function modcategory($dbh,$id){
  //Recibimos la conexión desde el controller
  try {
      //configuramos la consulta a la base de datos
      //Evitamos la inyeccion de SQL por medio de marcadores de posición y bindParam
      //Seleccionamos los datos que nos interesan
      $stmt = $dbh->prepare("SELECT cat_name, cat_description FROM categories WHERE cat_id = :id");
      $stmt->bindParam(':id', $id, PDO::PARAM_STR);
      $stmt->execute();
      $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);

      //TODO MODIFICAR REGISTRO
      ?>
      <main class="container admin" id="content">
      <form action="" method="post" class="narrow">
        <h1>Añadir Categoria</h1>
      
  
        <div class="form-group">
          <label for="name">Categoria: </label>
          <input type="text" name="cat_name" id="cat_name" class="form-control">
        </div>
  
        <div class="form-group">
          <label for="description">Descripción: </label>
          <textarea name="cat_description" id="cat_description"
                    class="form-control"></textarea>
        </div>
  
        <input type="submit" value="Grabar" name="addcategory"class="btn btn-primary btn-save">
      </form>
    </main>
      
      //Visualizamos el listado de categorias
      ?>        
  
      <section class="header">
          
            <?php
            //Con usuario administrador (Level 0) aparecera boton añadir categoria
            if($_SESSION['user_level'] == 0) {
            ?>
            <a href="indexAddCat.php" class="btn btn-secondary">Añadir</a>
            <?php
            }
             ?>
           
           </section>
    
      <?php  
  } catch (PDOException $e) {
      echo "ERROR: " . $e->getMessage();
  }
}


?>
