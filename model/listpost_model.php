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
              //Mostrará solo llos temas sin opción de editar o borrar
               foreach ($comentarios as $post) 
               { 
               include ('./view/MemberPost_view.php');
               } 
              
          ?>
      </main>
      <section class="header">
          
            <?php
            //Con usuario administrador (Level 0) o usuario registrado (Level 1) aparecera boton añadir comentario
            if($_SESSION['user_level'] == 0 || $_SESSION['user_level'] == 1) {
            ?>
            <!-- Pasamos el $id del tema al que pertenece el comentario -->
            <a href="indexAddPost.php?id=<?= $id ?>" class="btn btn-secondary">Añadir</a>
            <?php
            }
             ?>
           
           </section>
      
      <?php  
  } catch (PDOException $e) {
      echo "ERROR: " . $e->getMessage();
  }
}