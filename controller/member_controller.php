<?php
require('./domain/Conecction.php'); //Clase conexion

function iniMember(){
  $conection = new Conecction();          //Creamos un objeto conexion
  $dbh = $conection->getConection();             //Abrimos conexion
  include('view/MemberHome_view.php');       //Llamamos a la vista del listado de categorias de miembros
  include('model/listcategory_model.php');  //LLamamos al modelo que gestiona el listado de categorias
  listCategory($dbh);        //Llamada a la funcion listar categorias del modelo anterior y pasamos conexión
}

function closeSession(){
  session_start();
// Terminar la sesión:
  session_destroy();
  header('location: ./index.php');

}