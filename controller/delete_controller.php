<?php
function deleteCategory($id){
  require('./domain/Conecction.php');      //Llamamos al modelo de conexion PDO
  $conection = new Conecction();
  $dbh = $conection->getConection();        //Realizamos la conexion y la almacenamos en una varible
  include('model/delcategory_model.php');   //Llamamos al modelo de eliminar categoria
  delCategory($id,$dbh);                 //Llamada a la funcion borrar categorias del modelo anterior y pasamos conexión e $id
  include('view/header_view.php');
}

?>