<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/yoBlog/include/session.php');
require_once('../model/DeletePost.php');
require_once '../view/view.php';

if (isset($_SESSION['username'], $_POST['requestType'])) {
  $deletePost = new DeletePost;

  switch ($_POST['requestType']) {
    case 'showView':
      $posts = $deletePost->getPosts($_SESSION['username']);
      showView($posts);
      break;
    case 'deletePost':
      if (isset($_POST['request'])) {
        $request = $_POST['request'];

        if (isset($request['postDate'])) $deletePost->deletePostAction($_SESSION['username'],
                                                                 $request['postDate']);
      }

      break;
  }
}
