<?php

function iniForum(){
  require('model/connect_model.php');
  getConection();  
  include('view/home_view.php');
}

function iniCategory(){
  require('model/connect_model.php');
  $dbh = getConection();
  include('view/list_view.php');
  listCategory($dbh);
  include('view/footer_view.php');
  

}
