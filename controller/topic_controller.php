<?php

function iniTopic($id){
  
  require('model/connect_model.php');       //Llamamos al modelo de conexion PDO
  $dbh = getConection();                    //Realizamos la conexion y la almacenamos en una varible
  include('view/topics_view.php');            //Llamamos a la vista del listado de temas
  include('model/listtopics_model.php');  //LLamamos al modelo que gestiona el listado de temas
  listTopics($dbh,$id);                       //Llamada a la funcion listar categorias del modelo anterior y pasamos conexión
  
}

?>