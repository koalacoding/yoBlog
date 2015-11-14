<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/yoBlog/common/session/session.php');
require_once('../model/NewPost.php');
require_once('../view/view.php');
require_once $_SERVER['DOCUMENT_ROOT'] . '/yoBlog/common/antiFlood/controller/controller.php';

// If the user is connected and if the type of the request has been received.
if (isset($_SESSION['username'], $_POST['requestType'])) {
  $newPost = new NewPost;

  switch($_POST['requestType']) {
    case 'showView':
      showView();
      break;
    case 'addNewPost':
      $request = array();

      if (isset($_POST['request'])) {
        $request = $_POST['request'];

        if (isset($request['title'], $request['content'])) {
          $newPost->addNewPost($_SESSION['username'], $request['title'], $request['content']);
        }
      }

      break;
  }
}
