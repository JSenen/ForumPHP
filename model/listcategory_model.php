<?php
function listCategory($dbh){
  //Recibimos la conexión desde el controller
  try {
      //configuramos la consulta a la base de datos
      $stmt = $dbh->prepare('SELECT cat_id, cat_name, cat_description FROM categories');
      $stmt->execute();
  
      $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
      
      //Visualizamos el listado de categorias
      ?>        
      <main class="container" id="content">
        <section class="header">
          <h1>Categorias</h1>
        </section>

        <table class="categories">
          <tr>
            <th>Categoria</th>
            <th>Descripción</th>
            <?php
            //Comprobación si hay sesion iniciada por un invitado(sin registrar)  o usuario
            if(!isset($_SESSION['user_level']) || $_SESSION['user_level'] == 1){
              //Si no se ha iniciado session o solo es usuario normal.
              //Mostrará solo las categorias sin opción de editar o borrar
               foreach ($resultado as $category) { 
               include ('./view/MemberCategory_view.php');
               } 
              
            } elseif($_SESSION['user_level'] == 0 ){ {
            //Si usuario es administrador se mostraran opciones de edicion y borrado
             include('./view/AdminOptions_view.php');
              
            } ?>
          </tr>
          <?php foreach ($resultado as $category) { 
            include ('./view/AdminCategory_view.php');
            
           } } ?>
      </main>
      <?php  
  } catch (PDOException $e) {
      echo "ERROR: " . $e->getMessage();
  }
}


?>
