<?php
require_once('./domain/Conecction.php'); //Clase conexion
function checkLogin()
{

  require('./view/login_view.php');
  require('./model/login_model.php');
  getLogin(); //Comprobamos login
}

function addUser()
{
  require('./view/Register_view.php');
  require('./model/register_model.php');
  addRegister(); //Añadimos nuevo usuario
}

?>