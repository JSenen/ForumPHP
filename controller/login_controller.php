<?php
require('./domain/Conecction.php'); //Clase conexion
function checkLogin(){
  
  require('./view/login_view.php');
  require('./model/login_model.php');
  getLogin();
}