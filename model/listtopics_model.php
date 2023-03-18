<?php
function listTopics($dbh,$id){
  
  //Recibimos la conexión desde el controller
  try {
      //configuramos la consulta a la base de datos
      $stmt = $dbh->prepare("SELECT topic_id, topic_subject, topic_by FROM topics WHERE topic_cat = '$id'");
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
            //Comprobación si hay sesion iniciada por un invitado(sin registrar)  o usuario
            if(!isset($_SESSION['user_level']) || $_SESSION['user_level'] !='0' )
            {
              //Si no se ha iniciado session o solo es usuario normal.
              //Mostrará solo las categorias sin opción de editar o borrar
               foreach ($temas as $topic) 
               { 
               include ('./view/MemberTopic_view.php');
               } 
              
            } else { 
              
            //Si usuario es administrador se mostraran opciones de edicion y borrado
             include('./view/AdminOptions_view.php');
              
             ?>
          </tr>
          <?php foreach ($temas as $topic) { 
            include ('./view/AdminTopic_view.php');
            
           } } ?>
      </main>
      <?php  
  } catch (PDOException $e) {
      echo "ERROR: " . $e->getMessage();
  }
}


?>
