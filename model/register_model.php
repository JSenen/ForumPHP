<?php
require('./controller/sendmail_controller.php'); //Controlador función envio de mail
function addRegister(){
  $message = '';
  $conection = new Conecction(); //Objeto conexion
  $dbh = $conection->getConection(); //Conectamos a la base de datos
  if (isset($_POST['register'])){
    //Obtenemos los datos del formulario.
    $name = $_POST['name'];
    $email =$_POST['email'];
    $password = $_POST['password'];
    $passhash = password_hash($password, PASSWORD_DEFAULT); //Ciframos contraseña

    //Validamos el campo mail antes de grabar en la base y enviar mail a usuario
    if(filter_var($email, FILTER_VALIDATE_EMAIL)) {     //Valida mail
      sendmail($email,$name);                           //Email correcto, envia a usuario
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
      $sec = 3; //Segundos aparece mensaje de login correcto y envio de mail
      $message = "!REGISTRO CORRECTO¡. Se envia mail a su cuenta, Gracias!";
      include('./view/success_header_view.php');
      header("Refresh: $sec; url=indexLogin.php"); //Despues de los segundos establecidos nos reinicia la página de Login  
    }else{
      //No mail correcto. Arroja mensaje y tras un tiempo vuelve a recargar página
      $sec = 3; //Segundos aparece mensaje de mail no valido
      $message = 'EMAIL INTRODUCIDO NO VALIDO';
      include('./view/error_header_view.php');
      header("Refresh: $sec; url=indexRegister.php"); //Despues de los segundos establecidos nos reinicia la página de regisro   
    
    
  }
  }
}
?>