<?php

function addRegister(){
  $conection = new Conecction(); //Objeto conexion
  $dbh = $conection->getConection(); //Conectamos a la base de datos
  if (isset($_POST['register'])){
    //Obtenemos los datos del formulario.
    $name = $_POST['name'];
    $email =$_POST['email'];
    $password = $_POST['password'];
    $passhash = password_hash($password, PASSWORD_DEFAULT); //Ciframos contraseña
    try {
      $sql = "INSERT INTO users (user_name, user_mail, user_password) VALUES (:name,:email, :password)";
      $stmt = $dbh->prepare($sql);
      $stmt->bindParam(':name', $_POST['name'], PDO::PARAM_STR);
      $stmt->bindParam(':email', $_POST['email'], PDO::PARAM_STR);
      $stmt->bindParam(':password', $passhash, PDO::PARAM_STR);
      $stmt->execute();
    } catch (PDOException $e) {
      echo "ERROR: " . $e->getMessage();
    }
    header('location: indexLogin.php');
  }
}

?>