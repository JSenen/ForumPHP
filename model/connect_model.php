<?php

function getConection() {
    $dbname = "foro";       //Nombre de la Base de Datos
    $user = "root";             // Usuario
    $password = "root";         // Contraseña
    $server = 'localhost';      // Dirección servidor
    $dbh ="";
    
    // Con un array de opciones
    try {
    
        $dsn = "mysql:host=$server;dbname=$dbname;charset=UTF8";
        $dbh = new PDO($dsn, $user, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    return $dbh;
}

function getLogin(){
    if ( isset ($_POST['username']) && ($_POST('userpassword'))) {
        if($_POST['username'] == 'admin' && $_POST['userpassword'] == 'admin ') {
            return $result = 'login';
        } else {
            return $result = 'invalida user';
        }
    }
}

function listCategory($dbh){
    getConection();
    try {
        //configuramos el prepared statement
        $stmt = $dbh->prepare('SELECT * FROM categories');
        $stmt->execute();
    
        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        /* Visualizamos los datos en una tabla
        Primero mostramos los links necesarios para ver sin paginar o
        paginados. El par�metro ?page, nos indicar� al tener valor 1 que es
        primera p�gina de resultados posibles.
        */
        echo "<p><b>Ver todos</b> | <a href='viewpaginated.php?page=1'>Ver paginados</a></p>";
        echo "<table border='1' cellpadding='10'>";
        echo "<tr> <th>ID</th> <th>Nombre</th> <th>Apellido</th> <th></th><th></th></tr>";
    
        foreach ($resultado as $categories) {
            // salida de contenidos de cada columna en una fila de la tabla
            echo "<tr>";
            echo '<td>' . $categories['cat_name'] . '</td>';
            echo '<td>' . $categories['cat_description'] . '</td>';
            echo "</tr>";
        }
    
        // terminamos la tabla
        echo "</table>";
    
    } catch (PDOException $e) {
        echo "ERROR: " . $e->getMessage();
    }
   
}

?>
