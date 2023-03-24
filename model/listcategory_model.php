<?php
function listCategory($dbh,$resultado){
  //Recibimos la conexión desde el controller
 
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
    
      

  
}


?>
