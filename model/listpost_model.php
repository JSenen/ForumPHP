<?php
function listPost($dbh,$comentarios,$topic_id){
  
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
            <a href="indexAddPost.php?id=<?= $topic_id ?>" class="btn btn-secondary">Añadir</a>
            <?php
            }
             ?>
           
           </section>
      
      <?php  
 
}