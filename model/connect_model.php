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
        echo 'CONEXION ESTABLECIDA';
      
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

?>
