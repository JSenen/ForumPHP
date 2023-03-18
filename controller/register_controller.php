<?php
require('./domain/Conecction.php'); //Clase conexion
function addUser(){
  require('./view/Register_view.php');
  require('./model/register_model.php');
  addRegister();
}

?>