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
            //Comprobación si hay sesion iniciada por un invitado(sin registrar)  o usuario
            if(!isset($_SESSION['user_level']) || $_SESSION['user_level'] !='0' )
            {
              //Si no se ha iniciado session o solo es usuario normal.
              //Mostrará solo las categorias sin opción de editar o borrar
               foreach ($comentarios as $post) 
               { 
               include ('./view/MemberPost_view.php');
               } 
              
            } else { 
              
            //Si usuario es administrador se mostraran opciones de edicion y borrado
             include('./view/AdminOptions_view.php');
              
             ?>
          </tr>
          <?php foreach ($comentarios as $post) { 
            include ('./view/AdminPost_view.php');
            
           } } ?>
      </main>
      <?php  
  } catch (PDOException $e) {
      echo "ERROR: " . $e->getMessage();
  }
}