<?php
require('./domain/Conecction.php'); //Clase conexion

function closeSession(){
  session_start();
// Terminar la sesión:
  session_destroy();
  header('location: ./index.php');

}