<?php
function listPost($dbh,$id){
  //Recibimos la conexión desde el controller
  try {
      //configuramos la consulta a la base de datos
      $stmt = $dbh->prepare("SELECT post_id, post_content, post_date FROM posts WHERE post_topic = '$id'");
      $stmt->execute();
  
      $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);

      //Visualizamos el listado de comentarios
      ?>        
      <main class="container" id="content">
        <section class="header">
          <h1>Comentarios</h1>
        </section>

        <table>
          <tr>
            <th>Comentarios</th>
            <th>Fecha</th>
            <th class="edit">Edit</th>
            <th class="del">Delete</th>
          </tr>
          <?php foreach ($resultado as $post) { ?>
            <tr>
              <td><?= $post['post_content'] ?></td>
              <td style="font-size:75%;"><?= $post['post_date'] ?></td>
              <td><a href="#<?= $post['post_id'] ?>"   
                    class="btn btn-primary">Edit</a></td>
              <td><a href="#<?= $post['post_id'] ?>"
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
