<?php
function listPost($dbh,$id){
  
  //Recibimos la conexión desde el controller
  try {
      //configuramos la consulta a la base de datos
      $stmt = $dbh->prepare("SELECT post_id, post_content, post_date, post_by FROM posts WHERE post_topic = :id");
      $stmt->bindParam(":id", $id, PDO::PARAM_INT);
      $stmt->execute();
  
      $comentarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

      //Visualizamos el listado de comentarios
      ?>        
      <main class="container" >
        <section class="header">
          <h1>Comentarios</h1>
        </section>

        <table>
        <tr>
            <th>Comentario</th>
            <th>Fecha</th>
            <th>Usuario</th>
            <?php
              //Si no se ha iniciado session o solo es usuario normal.
              //Mostrará solo las categorias sin opción de editar o borrar
               foreach ($comentarios as $post) 
               { 
               include ('./view/MemberPost_view.php');
               } 
              
          ?>
      </main>
      
      <?php  
  } catch (PDOException $e) {
      echo "ERROR: " . $e->getMessage();
  }
}