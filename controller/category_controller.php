<?php
require('./domain/Conecction.php');   //Requerimos la clase Connection
//Controlador de diferentes funciones de la página
function iniForum(){                      
  $conection = new Conecction();          //Creamos un objeto conexion
  $conection->getConection();             //Abrimos conexion
  include('view/home_view.php');
}
//Funcion para el inicio de la página Categorias
function iniCategory(){
  $conection = new Conecction();            //Creamos objeto conexion
  $dbh = $conection->getConection();        //Realizamos la conexion y la almacenamos en una varible
  include('view/list_view.php');            //Llamamos a la vista del listado de categorias
  include('model/listcategory_model.php');  //LLamamos al modelo que gestiona el listado de categorias
  listCategory($dbh);                       //Llamada a la funcion listar categorias del modelo anterior y pasamos conexión
  
}
