<?php
require('./domain/Conecction.php');       //Llamamos al modelo de conexion PDO
function iniTopic($id){

    //Recogemos la $id de la categoria para buscar los temas relacionados con ella
    $conection = new Conecction();
    $dbh = $conection->getConection();       //Realizamos la conexion y la almacenamos en una varible
    include('view/topics_view.php');        //Lamamos a la vista de Temas 
    include('model/listtopics_model.php');  //LLamamos al modelo que gestiona el listado de temas
    listTopics($dbh,$id);                   //Llamada a la funcion listar categorias del modelo anterior y pasamos conexión
  
}

function addTopic($id){
    //Recogemos la $id de la categoria 
    $conection = new Conecction();
    $dbh = $conection->getConection();       //Realizamos la conexion y la almacenamos en una varible
    include('view/MemberHome_view.php');      //Cabecera visible para usuarios registrados
    include('view/addtopic_view.php');
    include('model/addtopic_model.php');
    addNewTopic($dbh,$id);
    
    

}

?>