<?php
session_start();
// Initialize variables
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT); // Recibimos la id de la categoria y validamos int

define('CONTROLLER_FOLDER', "controller/"); //Directorio donde definimos los controladores
define('DEFAULT_CONTROLLER', "post"); //Controlador por defecto
define('DEFAULT_ACTION', "iniPost"); //Accion por defecto

//Obtenemos el controlador. Si no por defecto
$controller = DEFAULT_CONTROLLER;
if (!empty($_GET['controller']))
  $controller = $_GET['controller'];
//Obtenemos la accion deseada. Si no por defecto
$action = DEFAULT_ACTION;
if (!empty($_GET['action']))
  $action = $_GET['action'];

//Formacion del fichero que contiene el controlador
$controller = CONTROLLER_FOLDER . $controller . '_controller.php';
//Si la variable controller es un fichero, lo requerimos

if (is_file($controller))
  require_once($controller);
else
  die("El controlador no existe 404 Not found");

//Si action es una función, ejecutamos el script
if (is_callable($action))
  $action($id);
else
  die("La accion requerida no existe 404 not found");