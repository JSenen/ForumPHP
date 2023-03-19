<?php

function iniTopic($id){

    //Recogemos la $id de la categoria para buscar los temas relacionados con ella
    require('./domain/Conecction.php');       //Llamamos al modelo de conexion PDO
    $conection = new Conecction();
    $dbh = $conection->getConection();       //Realizamos la conexion y la almacenamos en una varible
    include('view/topics_view.php');        //Lamamos a la vista de Temas 
    include('model/listtopics_model.php');  //LLamamos al modelo que gestiona el listado de temas
    listTopics($dbh,$id);                   //Llamada a la funcion listar categorias del modelo anterior y pasamos conexión
  
}

?>