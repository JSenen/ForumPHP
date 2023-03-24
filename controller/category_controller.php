<?php
require_once('./domain/Conecction.php');   //Requerimos la clase Connection
require_once('./domain/Category.php');     //Requerimos clase Category 

//Controlador de diferentes funciones de la página
function iniForum(){                      
  $conection = new Conecction();          //Creamos un objeto conexion
  $conection->getConection();             //Abrimos conexion
  include('view/header_view.php');        //llamada a vista 
  include('view/footer_view.php'); 
}
//Funcion para el inicio de la página Categorias
function iniCategory(){
  
  $conection = new Conecction();            //Creamos objeto conexion
  $dbh = $conection->getConection();        //Realizamos la conexion y la almacenamos en una varible
  include('view/header_view.php');          //Llamamos a la vista del listado de categorias
  $categories = new Category();             // Creamos un Objeto categoria
  $resultado = $categories->getCategories($dbh);  //Obtenemos resultado. 
  include('model/listcategory_model.php');  //LLamamos al modelo que gestiona el listado de categorias
  listCategory($dbh,$resultado);            //Ejecutamos función listado categorias del model
}

function addCategory(){
  $conection = new Conecction();
  $dbh = $conection->getConection();        //Realizamos la conexion y la almacenamos en una varible
  include('view/MemberHome_view.php');      //Cabecera visible para usuarios registrados
  include('view/addcategory_view.php');
  include('model/addcategory_model.php');
  addNewCategory($dbh);                     //Añadimos categoria
  
}

function modCategory($id){
  $conection = new Conecction();
  $dbh = $conection->getConection();
  $categories = new Category();                       // Creamos un Objeto categoria
  $resultado = $categories->getOneCategory($id,$dbh); //Recibimos resultado categoria por id
  include('view/MemberHome_view.php');  
  include('model/modcategory_model.php');
  modCat($dbh,$id,$resultado);                        //Modificamos categoria
}