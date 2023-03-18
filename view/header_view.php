<!DOCTYPE html>
<html lang="en-US">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FORUM PHP</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link rel="preconnect" href="https://fonts.gstatic.com"> 
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap">
    <link rel="shortcut icon" type="image/png" href="img/favicon.ico">
  </head>
<body>	
    <header>
      <div class="container">
        
            <div class="logo">
              <a href="index.php"><img src="img/logo.png" alt="Creative Folk"></a>
            </div>
            <div>
            <h3>Bienvenido<?php
            
              //Dependiendo del nivel de usuario podra acceder a distintas funciones
              if(!isset($_SESSION['user_level']) || $_SESSION['user_level']!= 0){
                $_SESSION['user_level'] = 3;
                $_SESSION['user_name'] = 'Invitado';
                
              }elseif($_SESSION['user_level'] == 0 ){
                echo '      (Administrador)';
              }elseif($_SESSION['user_level'] == 1) {
                echo '      (Usuario)';
              }
              echo '       '.$_SESSION['user_name'];
              ?></h3>
            </div>
          <nav>
            <ul id="menu">
              <li><a href="indexCategory.php" class="on" aria-current="page">Categorias</a></li>
              <li><a href="indexLogin.php" class="on" aria-current="page">Login</a></li>
              <li><a href="indexLoginOut.php" class="on" aria-current="page">Logo Out</a></li>
            </ul>
          </nav>
      </div><!-- /.container -->
    </header>
  
  
