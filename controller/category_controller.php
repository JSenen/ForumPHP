<?php
require_once('./domain/Conecction.php');   //Requerimos la clase Connection
//Controlador de diferentes funciones de la página
function iniForum(){                      
  $conection = new Conecction();          //Creamos un objeto conexion
  $conection->getConection();             //Abrimos conexion
  include('view/header_view.php');
}
//Funcion para el inicio de la página Categorias
function iniCategory(){
  $conection = new Conecction();            //Creamos objeto conexion
  $dbh = $conection->getConection();        //Realizamos la conexion y la almacenamos en una varible
  include('view/header_view.php');            //Llamamos a la vista del listado de categorias
  include('model/listcategory_model.php');  //LLamamos al modelo que gestiona el listado de categorias
  listCategory($dbh);                       //Llamada a la funcion listar categorias del modelo anterior y 
}

function addCategory(){
  $conection = new Conecction();
  $dbh = $conection->getConection();        //Realizamos la conexion y la almacenamos en una varible
  include('view/MemberHome_view.php');      //Cabecera visible para usuarios registrados
  include('view/addcategory_view.php');
  include('model/addcategory_model.php');
  addNewCategory($dbh);
  
}

function modCategory($id){
  $conection = new Conecction();
  $dbh = $conection->getConection();  
  include('view/MemberHome_view.php');
  include('view/modcategory_view.php');
  
}