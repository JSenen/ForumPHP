<?php

function getLogin(){
  $conection = new Conecction(); //Objeto conexion
  $dbh = $conection->getConection(); //Conectamos a la base de datos
  ?>
  <main class="container" id="content">

<section class="header">
  <h1>Log in</h1>
</section>
  <form method="POST" action="" class="form-login">

    <div class="form-group">
      <label for="name">Nombre </label>
      <input type="text" name="name" id="nombre" value="" class="form-control">
      <div class="errors"></div>
    </div>

    <div class="form-group">
      <label for="password">Password </label>
      <input type="password" name="password" id="password" class="form-control">
      <div class="errors"></div>
    </div>

    <input type="submit" class="btn btn-primary" value="Log in"><br>
    <p><a href="#">Nuevo Registro</a></p>
  </form>
  </main>
  <?php
  if (isset($_POST['name'],$_POST['password'])){
    $name = $_POST['name'];
    $password = $_POST['password'];
    $stmt = $dbh->prepare("SELECT user_id, user_level, user_name FROM users WHERE user_name = '$name' AND user_password = '$password'");
      $stmt->execute();
      $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
      $row = $stmt->rowCount();		//Contamos numero de filas que devuelve la consulta
      if ($row > 0){              //Si el número de filas >0 el usuario existe
        session_start();          //Iniciamos sesion
        foreach ($resultado as $user){      
          $username = $user['user_name'];     //Recuperamos el nombre de usuario
          $userid = $user['user_id'];
          $userlevel = $user['user_level'];
        }
        $_SESSION['user_name'] = $username;	//Asignamos a la sesion del usuario el campo de nombre
        $_SESSION['user_id'] = $userid;	//Asignamos a la sesion del usuario el campo de id
        $_SESSION['user_level'] = $userlevel;	//Asignamos a la sesion del usuario el campo de nombre
        setcookie('forumphp','',86400); //Establecemos una cokkie de 1 dia
        header('location: indexMember.php');  //Enviamos a la página para usuarios registrados
      } else {
        session_write_close(); //Borramos sesiones anteriores
        //Javascript para ventana emergante en caso de error
					echo "
					<script>alert('Nombre de usuario o password erroneos')</script>								
					<script>window.location = './index.php'</script>
					";
      }
  }
}

?>