<?php
function listTopics($dbh,$id){
  
  //Recibimos la conexión desde el controller al igual que la $id de la categoria a la que corresponden
  try {
      //configuramos la consulta a la base de datos para evitar el ataque inyeccion SQL por medio
      // de marcadores de posicion y bindParam
      $stmt = $dbh->prepare("SELECT topic_id, topic_subject, topic_by FROM topics WHERE topic_cat = :id ");
      $stmt->bindParam(":id", $id, PDO::PARAM_INT);
      $stmt->execute();
  
      $temas = $stmt->fetchAll(PDO::FETCH_ASSOC);

      //Visualizamos el listado de categorias
      ?>        
      <main class="container" id="content">
        <section class="header">
          <h1>Temas</h1>
        </section>

        <table class="categories">
          <tr>
            <th>Temas</th>
            <?php
                //Si no se ha iniciado session o solo es usuario normal.
              //Mostrará solo las categorias sin opción de editar o borrar
               foreach ($temas as $topic) 
               { 
               include ('./view/MemberTopic_view.php');
               } 
          ?>
      </main>
      <section class="header">
          
          <?php
          //Con usuario administrador (Level 0) aparecera boton añadir tema
          if($_SESSION['user_level'] == 0) {
          ?>
          <a href="#<?= $category['cat_id'] ?>" class="btn btn-secondary">Añadir</a>
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
