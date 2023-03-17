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
            <th class="edit">Edit</th>
            <th class="del">Delete</th>
          </tr>
          <?php foreach ($resultado as $category) { ?>
            <tr>
              <td><a href="indexTopics.php?id=<?= $category['cat_id'] ?>"><strong><?= $category['cat_name'] ?></strong></a></td>
              <td><strong><?= $category['cat_description'] ?></strong></td>
              
              <td><a href="#<?= $category['cat_id'] ?>"   
                    class="btn btn-primary">Edit</a></td>
              <td><a href="#<?= $category['cat_id'] ?>"
                    class="btn btn-danger">Delete</a></td>
            </tr>
          <?php } ?>
      </main>
      <?php
     // }
  
  } catch (PDOException $e) {
      echo "ERROR: " . $e->getMessage();
  }
 
}


?>
