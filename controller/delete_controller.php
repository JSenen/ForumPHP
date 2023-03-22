<?php
require_once('./domain/Conecction.php');      //Llamamos al modelo de conexion PDO
function deleteCategory($id){
  
  $conection = new Conecction();
  $dbh = $conection->getConection();        //Realizamos la conexion y la almacenamos en una varible
  include('model/delcategory_model.php');   //Llamamos al modelo de eliminar categoria
  delCategory($id,$dbh);                 //Llamada a la funcion borrar categorias del modelo anterior y pasamos conexión e $id
  include('view/header_view.php');
}

function deleteTopic($id){
  $conection = new Conecction();
  $dbh = $conection->getConection();        //Realizamos la conexion y la almacenamos en una varible
  include('model/deltopic_model.php');   //Llamamos al modelo de eliminar tema
  delTopic($id,$dbh);                 //Llamada a la funcion borrar temas del modelo anterior y pasamos conexión e $id
  include('view/header_view.php');
 
}

function delPost($id){
  $conection = new Conecction();
  $dbh = $conection->getConection();        //Realizamos la conexion y la almacenamos en una varible
  include('model/delpost_model.php');   //Llamamos al modelo de eliminar tema
  deletepost($id,$dbh);                 //Llamada a la funcion borrar temas del modelo anterior y pasamos conexión e $id
  include('view/header_view.php');
}

?>