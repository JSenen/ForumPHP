<?php

function listCategory(){
  require('model/connect_model.php');
  getConection();  
  include('view/home_view.php');
}