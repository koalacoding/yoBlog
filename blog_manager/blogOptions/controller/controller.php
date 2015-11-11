<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/yoBlog/include/session.php');
require_once('../model/BlogOptions.php');
require_once('../view/view.php');

if (isset($_SESSION['username'], $_POST['requestType'])) {
  $blogOptions = new BlogOptions;

  switch ($_POST['requestType']) {
    case 'showView':
      showView();
      break;
    case 'updateBlogOptions':
      $request = $_POST['request'];

      if (isset($request['headerBackgroundImage'], $request['headerTextColor'],
                $request['title'], $request['description'])) {
        $headerBackgroundImage = $request['headerBackgroundImage'];
        $headerTextColor = $request['headerTextColor'];
        $title = $request['title'];
        $description = $request['description'];

        $blogOptions->updateBlogOptions($headerBackgroundImage, $headerTextColor, $title,
                                               $description, $_SESSION['username']);
      }

      break;
  }
}
