<?php
//Controlador de diferentes funciones de la página
function iniForum(){                      //Función inicio de la página
  require('model/connect_model.php');
  getConection();  
  include('view/home_view.php');
}

function iniCategory(){
  require('model/connect_model.php');       //Llamamos al modelo de conexion PDO
  $dbh = getConection();                    //Realizamos la conexion y la almacenamos en una varible
  include('view/list_view.php');            //Llamamos a la vista del listado de categorias
  include('model/listcategory_model.php');  //LLamamos al modelo que gestiona el listado de categorias
  listCategory($dbh);                       //Llamada a la funcion listar categorias del modelo anterior y pasamos conexión
  
}
