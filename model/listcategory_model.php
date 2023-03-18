<?php
function listCategory($dbh){
  //Recibimos la conexión desde el controller
  try {
      //configuramos la consulta a la base de datos
      $stmt = $dbh->prepare('SELECT cat_id, cat_name, cat_description FROM categories');
      $stmt->execute();
  
      $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
      
      //Visualizamos el listado de categorias
      ?>        
      <main class="container" id="content">
        <section class="header">
          <h1>Categorias</h1>
        </section>

        <table class="categories">
          <tr>
            <th>Categoria</th>
            <th>Descripción</th>
            <?php
            if(!isset($_SESSION['user_level']) || $_SESSION['user_level'] == 1){
              //Si no se ha iniciado session se le adjudica como usuario sin registrar
               foreach ($resultado as $category) { ?>
                <tr>
                  <td><a href="indexTopics.php?id=<?= $category['cat_id'] ?>"><strong><?= $category['cat_name'] ?></strong></a></td>
                  <td><?= $category['cat_description'] ?></td>
                </tr>
              <?php } 
              
            } elseif($_SESSION['user_level'] == 0 ){ {
            //Si usuario es administrador se mostraran opciones de edicion y borrado
             ?>
              <th class="edit">Edit</th>
              <th class="del">Delete</th> <?php
            } ?>
            
          </tr>
          <?php foreach ($resultado as $category) { ?>
            <tr>
              <td><a href="indexTopics.php?id=<?= $category['cat_id'] ?>"><strong><?= $category['cat_name'] ?></strong></a></td>
              <td><?= $category['cat_description'] ?></td>
             
              <td><a href="#<?= $category['cat_id'] ?>"   
                    class="btn btn-primary">Edit</a></td>
              <td><a href="#<?= $category['cat_id'] ?>"
                    class="btn btn-danger">Delete</a></td>
            </tr>
          <?php } } ?>
      </main>
      <?php
     
  
  } catch (PDOException $e) {
      echo "ERROR: " . $e->getMessage();
  }
  return $resultado;
}


?>
