<?php
require_once('./domain/Conecction.php'); //Llamamos al modelo de conexion PDO
require_once('./domain/Post.php'); //Requerimos clase Post 
function iniPost($topic_id)
{
  $conection = new Conecction();
  $dbh = $conection->getConection(); //Realizamos la conexion y la almacenamos en una varible
  include('view/header_view.php'); //Llamamos a la cabecera
  $post = new Post();
  $comentarios = $post->getPosts($dbh, $topic_id);
  include('model/listpost_model.php'); //LLamamos al modelo que gestiona el listado de comentarios
  listPost($dbh, $comentarios, $topic_id); //Llamada a la funcion listar comentarios del modelo anterior y pasamos conexión
}

function addPost($topic_id)
{
  $conection = new Conecction();
  $dbh = $conection->getConection(); //Realizamos la conexion y la almacenamos en una varible
  include('view/MemberHome_view.php'); //Llamamos a la vista de los usuarios registrado
  include('view/addpost_view.php'); //LLamamos a la vista para añadir comentarios
  require('model/addpost_model.php'); //Llamamos al modelo añadir nuevo comentario
  addNewPost($dbh, $topic_id); //Llamada a la funcion añadir comentarios. 

}

function modPost($post_id)
{
  //Recogemos la $id del comentario
  $conection = new Conecction();
  $dbh = $conection->getConection(); //Realizamos la conexion y la almacenamos en una varible
  $post = new Post();
  $comentario = $post->getOnePost($post_id, $dbh);
  include('view/MemberHome_view.php');
  include('model/modpost_model.php');
  modyPost($dbh, $post_id, $comentario);
}
?>