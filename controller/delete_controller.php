<?php
require_once('./domain/Conecction.php');    //Llamamos al modelo de conexion PDO
require_once('./domain/Post.php');          //Requerimos clase Post 
require_once('./domain/Category.php');      //Requerimos clase Category 
require_once('./domain/Topic.php');         //Requerimos clase Topic 
function deleteCategory(){
  
  $conection = new Conecction();
  $dbh = $conection->getConection();      //Realizamos la conexion y la almacenamos en una varible
  include('model/delcategory_model.php'); //Llamamos al modelo de eliminar categoria
  delCategory($dbh);                      //Llamada a la funcion borrar categorias del modelo anterior y pasamos conexión e $id
  include('view/header_view.php');
}

function deleteTopic(){
  $conection = new Conecction();
  $dbh = $conection->getConection();    //Realizamos la conexion y la almacenamos en una varible
  include('model/deltopic_model.php');  //Llamamos al modelo de eliminar tema
  delTopic($dbh);                       //Llamada a la funcion borrar temas del modelo anterior y pasamos conexión e $id
  include('view/header_view.php');
 
}

function delPost(){
  $conection = new Conecction();
  $dbh = $conection->getConection();     //Realizamos la conexion y la almacenamos en una varible
  include('model/delpost_model.php');   //Llamamos al modelo de eliminar tema
  deletepost($dbh);                 //Llamada a la funcion borrar temas del modelo anterior y pasamos conexión e $id
  include('view/header_view.php');
}

?>