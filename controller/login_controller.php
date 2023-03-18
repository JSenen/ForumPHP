<?php
require('./domain/Conecction.php'); //Clase conexion
function checkLogin(){
  $conection = new Conecction(); //Objeto conexion
  $dbh = $conection->getConection(); //Conectamos a la base de datos
  require('./view/login_view.php');
  require('./model/login_model.php');
  getLogin();
}