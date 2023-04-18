<?php
function listTopics($dbh,$temas,$cat_id){
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
          if($_SESSION['user_level'] == 0 || $_SESSION['user_level'] == 1) {
          ?>
          <!-- Para ñadir el tema pasamos el id de la categoria -->
          <a href="indexAddTopic.php?id=<?= $cat_id ?>" class="btn btn-secondary">Añadir</a>
          <?php
          }
           ?>
         </section>
      <?php  
  
}


?>
