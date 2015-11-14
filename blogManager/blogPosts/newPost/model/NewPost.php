<?php
class NewPost {
  function addNewPost($username, $title, $content) {
    require_once($_SERVER['DOCUMENT_ROOT'] . '/yoBlog/common/sql/connexion.php');

    $username = htmlentities($username, ENT_QUOTES);
    $title = htmlentities($title, ENT_QUOTES);
    $content = htmlentities($content, ENT_QUOTES);

    $request = $bdd->prepare("INSERT INTO posts(username, title, content, postDate, timeSinceEpoch)
                              VALUES(?, ?, ?, NOW(), ?)");
    $request->execute(array($username, $title, $content, time()));
    $request->closeCursor();

    echo 'ok';
  }
}
