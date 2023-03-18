<?php
function listPost($dbh,$id){
  
  //Recibimos la conexión desde el controller
  try {
      //configuramos la consulta a la base de datos
      $stmt = $dbh->prepare("SELECT post_id, post_content, post_date, post_by FROM posts WHERE post_topic = '$id'");
      $stmt->execute();
  
      $comentarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

      //Visualizamos el listado de comentarios
      ?>        
      <main class="container" id="content">
        <section class="header">
          <h1>Comentarios</h1>
        </section>

        <table>
        <tr>
            <th>Comentario</th>
            <th>Fecha</th>
            <?php
               foreach ($comentarios as $post) 
               { 
               include ('./view/MemberPost_view.php');
               } 
            ?>
          </tr>
      </main>
      <?php  
  } catch (PDOException $e) {
      echo "ERROR: " . $e->getMessage();
  }
}