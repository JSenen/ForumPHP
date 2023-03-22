<?php require_once('./model/utils.php'); 
      require_once ('./model/searchUser_model.php');
      if(!isset($_SESSION['user_id'])){
        $_SESSION['user_id'] = 3;
      }
?>
<tr>
  <td><?= $post['post_content'] ?></td>
  <td style="font-size:75%;"><?= $date=fixdate($post['post_date']) ?></td>
  <td><?= searchUser($post['post_by'],$dbh); ?></td>
  <?php
  //Con sesion de administrador o usuario registrado ofrece opciones en los comentarios de edicion o borrado
  if (isset($_SESSION['user_level']) && ($_SESSION['user_level'] == 0) || ($_SESSION['user_id'] == $post['post_by']) ) { ?>
  <td><a href="#<?= $post['post_id'] ?>" class="btn btn-primary">Modificar</a></td>
  <td><a href="#<?= $post['post_id'] ?>" class="btn btn-danger">Borrar</a></td>
  <?php
  }else {
 
  }
  ?>
</tr>