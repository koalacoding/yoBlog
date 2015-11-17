<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/yoBlog/common/session/session.php');
require_once '../model/BlogViewer.php';
require_once '../view/view.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/yoBlog/common/antiFlood/model/AntiFlood.php';

if (isset($_POST['requestType'], $_POST['blogName'])) {
  $blogViewer = new BlogViewer;
  $titleAndDescription = array();
  $posts = '';

  if ($_POST['blogName'] == '') { // If no blogName has been specified.
    // If the user is connected, the blogName is his username.
    if (isset($_SESSION['username'])) $_POST['blogName'] = $_SESSION['username'];
    else die(); // We die() the page if no blog has been specified.
  }

  switch ($_POST['requestType']) {
    case 'showView':
      $titleAndDescription = $blogViewer->getBlogTitleAndDescription($_POST['blogName']);
      $posts = $blogViewer->getPosts($_POST['blogName'], 0);
      showView($_POST['blogName'], $titleAndDescription['title'],
               $titleAndDescription['description'], 0, $posts);
      break;

    case 'getHeaderCss':
      $blogViewer->getHeaderCss($_POST['blogName']);
      break;

    case 'getPosts':
      require_once $_SERVER['DOCUMENT_ROOT'] . '/yoBlog/common/antiFlood/controller/controller.php';

      if (isset($_POST['request']['postOffset'])) {
        $posts = $blogViewer->getPosts($_POST['blogName'], $_POST['request']['postOffset']);
        echo $posts;
      }
  }
}
