<?php
function listCategory($dbh){
  //Recibimos la conexión desde el controller
  try {
      //configuramos la consulta a la base de datos
      //Evitamos la inyeccion de SQL por medio de marcadores de posición y bindParam
      $stmt = $dbh->prepare("SELECT cat_id, cat_name, cat_description FROM categories");
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
            
              //Si no se ha iniciado session o solo es usuario normal.
              //Mostrará solo las categorias sin opción de editar o borrar
               foreach ($resultado as $category) 
               { 
               include ('./view/MemberCategory_view.php');
               } 
               
             ?>
            
      </main>
      
      <section class="header">
          
            <?php
            //Con usuario administrador (Level 0) aparecera boton añadir categoria
            if($_SESSION['user_level'] == 0) {
            ?>
            <a href="indexAddCat.php" class="btn btn-secondary">Añadir</a>
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
