<?php

function searchUser($id, $dbh)
{
  try {
    $stmt = $dbh->prepare("SELECT user_name FROM users WHERE user_id = :id");
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    $stmt->execute();

    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $row = $stmt->rowCount(); //Contamos el numero de filas devuelto
    if ($row > 0) //Si el resultado el > 0, existe un usuario
    {
      foreach ($users as $username) {
        $name = $username['user_name']; //Recuperamos el nombre de usuario
        echo $name;
      }
    } else {
      echo '';
    }

  } catch (PDOException $e) {
    echo "ERROR: " . $e->getMessage();
  }
}