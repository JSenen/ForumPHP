<?php
require('./domain/Conecction.php');     //Llamamos al modelo de conexion PDO
function iniPost($id){
  $conection = new Conecction();
  $dbh = $conection->getConection();      //Realizamos la conexion y la almacenamos en una varible
  include ('view/header_view.php');              //Llamamos a la cabecera
  include('model/listpost_model.php');    //LLamamos al modelo que gestiona el listado de temas
  listPost($dbh,$id);                     //Llamada a la funcion listar categorias del modelo anterior y pasamos conexión
}

function addPost($id){
  $conection = new Conecction();
  $dbh = $conection->getConection();      //Realizamos la conexion y la almacenamos en una varible
  include('view/MemberHome_view.php');    //Llamamos a la vista de los usuarios registrado
  include('view/addpost_view.php');     //LLamamos a la vista para añadir comentarios
  require('model/addpost_model.php');    //Llamamos al modelo añadir nuevo tema
  addNewPost($dbh,$id);                  //Llamada a la funcion añadir temas. 

}
?>