<?php
function listCategory($dbh){
  //Recibimos la conexión desde el controller
  try {
      //configuramos la consulta a la base de datos
      $stmt = $dbh->prepare('SELECT cat_name, cat_description FROM categories');
      $stmt->execute();
  
      $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);

      // Con la función htmlspecialchars() se puede convertir caracteres especiales en html
      //Visualizamos el listado de categorias
      ?>        
          <main class="container grid" id="content">
          <?php foreach ($resultado as $category) { ?>
              <article class="summary">
                  <a href="#">
                      <h2><?= htmlspecialchars($category['cat_name']) ?></h2> 
                      <p><?= htmlspecialchars($category['cat_description']) ?></p>
                  </a>
              </article>
          <?php } ?>
      </main>
      <?php
     // }
  
  } catch (PDOException $e) {
      echo "ERROR: " . $e->getMessage();
  }
 
}


?>