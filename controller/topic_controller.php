<?php
require('./domain/Conecction.php');       //Llamamos al modelo de conexion PDO
require_once('./domain/Topic.php');       //Requerimos clase Category 
function iniTopic($cat_id){

    //Recogemos la $id del tema para buscar los temas relacionados con ella
    $conection = new Conecction();
    $dbh = $conection->getConection();      //Realizamos la conexion y la almacenamos en una varible
    include('view/header_view.php');        //Lamamos a la vista de Temas 
    $topic = new Topic();                   // Creamos un Objeto Tema
    $temas = $topic->getTopics($dbh,$cat_id);   //Obtenemos resultado
    include('model/listtopics_model.php');  //LLamamos al modelo que gestiona el listado de temas
    listTopics($dbh,$temas,$cat_id);                //Llamada a la funcion listar temas
  
}

function addTopic($id){
    //Recogemos la $id del tema
    $conection = new Conecction();
    $dbh = $conection->getConection();       //Realizamos la conexion y la almacenamos en una varible
    include('view/MemberHome_view.php');      //Cabecera visible para usuarios registrados
    include('view/addtopic_view.php');
    include('model/addtopic_model.php');
    addNewTopic($dbh,$id);
}

function modTopic($id){
    //Recogemos la $id del tema
    $conection = new Conecction();
    $dbh = $conection->getConection();       //Realizamos la conexion y la almacenamos en una varible
    $topics = new Topic();                   // Creamos un Objeto tema
    $temas = $topics->getOneTopic($id,$dbh); //Recibimos resultado tema por id
    include('view/MemberHome_view.php');  
    include('model/modtopic_model.php');
    modTop($dbh,$id,$temas);
}

?>