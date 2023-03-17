<?php
function listTopics($dbh){
  //Recibimos la conexión desde el controller
  try {
      //configuramos la consulta a la base de datos
      $stmt = $dbh->prepare('SELECT topic_id, topic_subject, topic_by FROM topics');
      $stmt->execute();
  
      $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);

      //Visualizamos el listado de categorias
      ?>        
      <main class="container" id="content">
        <section class="header">
          <h1>Temas</h1>
        </section>

        <table class="categories">
          <tr>
            <th>Temas</th>
            <th class="edit">Edit</th>
            <th class="del">Delete</th>
          </tr>
          <?php foreach ($resultado as $topic) { ?>
            <tr>
              <td><strong><?= $topic['topic_subject'] ?></strong></td>
              <td><a href="#<?= $topic['topic_id'] ?>"   
                    class="btn btn-primary">Edit</a></td>
              <td><a href="#<?= $topic['topic_id'] ?>"
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
