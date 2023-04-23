<main class="container admin" id="content">
  <form action="" method="post" class="narrow">
    <h1>Modificar Categoria</h1>

    <div class="form-group">
      <label for="name">Categoria: </label>
      <input type="text" name="cat_name" value="<?php echo $cat_name ?>" class="form-control">
    </div>

    <div class="form-group">
      <label for="description">Descripción: </label>
      <textarea name="cat_description" class="form-control"><?php echo $cat_description ?></textarea>
    </div>
    <input type="submit" value="Grabar" name="modcategory" class="btn btn-primary btn-save">
  </form>
</main>