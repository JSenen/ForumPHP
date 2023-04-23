<tr>
  <td><a href="indexTopics.php?id=<?= $category['cat_id'] ?>"><strong>
        <?= $category['cat_name'] ?>
      </strong></a></td>
  <td>
    <?= $category['cat_description'] ?>
  </td>
  <?php
  //Botones de modificar y Borrar sólo seran visibles para administradores
  if ($_SESSION['user_level'] == 0) {
    ?>
    <td><a href="indexModCat.php?id=<?= $category['cat_id'] ?>" class="btn btn-primary">Modificar</a></td>
    <td><a href="indexDelCat.php?id=<?= $category['cat_id'] ?>" class="btn btn-danger">Borrar</a></td>

    <?php
  }
  ?>
</tr>