<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/yoBlog/common/session/session.php';
require_once '../model/ModifyPost.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/yoBlog/blogManager/blogPosts/deletePost/view/view.php';


if (isset($_SESSION['username'], $_POST['requestType'])) {
  $modifyPost = new ModifyPost;

  switch ($_POST['requestType']) {
    case 'showView':
      $posts = $modifyPost->getPosts($_SESSION['username']);
      showView($posts);
      break;
    case 'getPostTitleAndContent':
      if (isset($_POST['request'])) {
        $request = $_POST['request'];
        if (isset($request['postDate'])) {
          $modifyPost->getPostTitleAndContent($_SESSION['username'], $request['postDate']);
        }
      }

      break;
    case 'modifyPost':
      if (isset($_POST['request'])) {
        $request = $_POST['request'];

        if (isset($request['postDate'], $request['title'], $request['content'])) {
           $modifyPost->modifyPostAction($_SESSION['username'], $request['postDate'],
                                         $request['title'], $request['content']);
        }
      }

      break;
  }
}
