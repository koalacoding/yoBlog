<?php
class NewPost {
  function addNewPost($username, $title, $content) {
    require_once($_SERVER['DOCUMENT_ROOT'] . '/yoBlog/common/sql/connexion.php');

    $username = htmlspecialchars($username);
    $title = htmlspecialchars($title);
    $content = htmlspecialchars($content);

    $request = $bdd->prepare("INSERT INTO posts(username, title, content, postDate, timeSinceEpoch)
                              VALUES(?, ?, ?, NOW(), ?)");
    $request->execute(array($username, $title, $content, time()));
    $request->closeCursor();

    echo 'ok';
  }
}
