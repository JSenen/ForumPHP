<tr>
  <td><a href="indexTopics.php?id=<?= $category['cat_id'] ?>"><strong><?= $category['cat_name'] ?></strong></a></td>
  <td><?= $category['cat_description'] ?></td>
  <?php
  if($_SESSION['user_level'] == 0) {
    ?>
      <td><a href="#<?= $category['cat_id'] ?>" class="btn btn-primary">Modificar</a></td>
      <td><a href="#<?= $category['cat_id'] ?>" class="btn btn-danger">Borrar</a></td>

    <?php
    }
    ?>
</tr>


