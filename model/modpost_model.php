<?php
function modyPost($dbh, $post_id, $comentario)
{

        //Pasamos el resultado al formulario
        foreach ($comentario as $post) {
                $post_content = $post['post_content'];
                $post_topic = $post['post_topic'];

                require('./view/modpost_view.php'); //Pasamos los datos a la vista del formulario
        }
        // Procesamo el formulario y guardamos los datos en la BD.
        if (isset($_POST['modifpost'])) {

                $subject = htmlspecialchars($_POST['post_content']);

                // guardamos los datos en la base de datos
                $coment = new Post();
                $coment->modyPost($dbh, $subject, $post_id);

                //una vez guardados, redirigimos a la página principal
                header("Location: indexPost.php?id=" . $post_topic);

        }
}