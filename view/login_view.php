<?php
include('header_view.php'); 
?>
<main class="container" id="content">

<section class="header">
  <h1>Log in</h1>
</section>
  <form method="POST" action="" class="form-login">

    <div class="form-group">
      <label for="name">Nombre </label>
      <input type="text" name="name" id="nombre" value="" class="form-control">
      <div class="errors"></div>
    </div>

    <div class="form-group">
      <label for="password">Password </label>
      <input type="password" name="password" id="password" class="form-control">
      <div class="errors"></div>
    </div>

    <input type="submit" class="btn btn-primary" value="Log in"><br>
    <p><a href="indexRegister.php">Nuevo Registro</a></p>


