<?php
function fixdate($date) {
  //Funcion que nos permite modificar el formato de la fecha 
  return date('d-m-Y', strtotime($date));
}
?>