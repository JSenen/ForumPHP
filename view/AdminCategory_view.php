<tr>
    <td><a href="indexTopics.php?id=<?= $category['cat_id'] ?>"><strong><?= $category['cat_name'] ?></strong></a></td>
    <td><?= $category['cat_description'] ?></td>     
    <td><a href="#<?= $category['cat_id'] ?>" class="btn btn-primary">Edit</a></td>
    <td><a href="#<?= $category['cat_id'] ?>" class="btn btn-danger">Delete</a></td>
</tr>