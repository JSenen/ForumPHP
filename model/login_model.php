<?php

function getLogin()
{
  $conection = new Conecction(); //Objeto conexion
  $dbh = $conection->getConection(); //Conectamos a la base de datos

  if (isset($_POST['name'], $_POST['password'])) {
    $name = $_POST['name'];
    $password = $_POST['password'];

    $stmt = $dbh->prepare("SELECT user_id, user_level, user_name, user_password FROM users WHERE user_name = :name");
    $stmt->bindParam(":name", $name, PDO::PARAM_STR);
    $stmt->execute();
    $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $row = $stmt->rowCount(); //Contamos numero de filas que devuelve la consulta
    if ($row > 0) {
      //Si el número de filas >0 el usuario existe    
      foreach ($resultado as $user) {
        $pass = $user['user_password'];
        if (password_verify($password, $pass)) {
          //comprobamos que la contraseña descifrada coincida
          session_start(); //Iniciamos sesion
          $username = $user['user_name']; //Recuperamos el nombre de usuario
          $userid = $user['user_id']; //Recuperamos Id de usuario
          $userlevel = $user['user_level']; //Recuperamos rol del usuario (0: Administrador 1: Usuario)
          $_SESSION['user_name'] = $username; //Asignamos a la sesion del usuario el campo de nombre
          $_SESSION['user_id'] = $userid; //Asignamos a la sesion del usuario el campo de id
          $_SESSION['user_level'] = $userlevel; //Asignamos a la sesion del usuario el tipo de rol
          setcookie('forumphp', '', 86400); //Establecemos una cokkie de 1 dia
          header('location: indexCategory.php'); //Enviamos a la página para usuarios registrados
        }

      }

    } else {
      $sec = 3; //Segundos aparece mensaje de login no valido
      $message = 'LOGIN INVALIDO';
      include('./view/error_header_view.php');
      session_write_close(); //Borramos sesiones anteriores
      header("Refresh: $sec; url=indexLogin.php"); //Despues de los segundos establecidos nos reinicia la página de Login 
    }
  }
}

?>