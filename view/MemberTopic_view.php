<tr>
  <td><a href="indexPost.php?id=<?= $topic['topic_id'] ?>"><strong><?= $topic['topic_subject'] ?></strong></a></td>
  <?php
  if($_SESSION['user_level'] == 0) {
  ?>
    <td><a href="#<?= $category['cat_id'] ?>" class="btn btn-primary">Modificar</a></td>
    <td><a href="indexDelTopic.php?id=<?= $topic['topic_id'] ?>" class="btn btn-danger">Borrar</a></td>
  <?php
  }
  ?>
</tr>