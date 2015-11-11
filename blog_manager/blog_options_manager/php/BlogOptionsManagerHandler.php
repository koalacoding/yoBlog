<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/php_blog/include/session.php');
require_once('BlogOptionsManager.php');

if (isset($_SESSION['username'], $_POST['requestType'])) {
  $blogOptionsManager = new BlogOptionsManager;

  switch ($_POST['requestType']) {
    case 'showContent':
      $blogOptionsManager->showContent();
      break;
    case 'updateBlogOptions':
      $request = $_POST['request'];

      if (isset($request['title'], $request['description'], $request['titleAndDescriptionColor'])) {
        $title = $request['title'];
        $description = $request['description'];
        $titleAndDescriptionColor = $request['titleAndDescriptionColor'];
        $blogOptionsManager->updateBlogOptions($title, $description, $titleAndDescriptionColor,
                                               $_SESSION['username']);
      }

      break;
  }
}
