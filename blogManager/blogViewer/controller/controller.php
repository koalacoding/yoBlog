<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/yoBlog/common/session/session.php');
require_once '../model/BlogViewer.php';
require_once '../view/view.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/yoBlog/common/antiFlood/controller/controller.php';

if (isset($_SESSION['username'], $_POST['requestType'])) {
  $blogViewer = new BlogViewer;
  $titleAndDescription = array();
  $posts = '';

  switch ($_POST['requestType']) {
    case 'showView':
      $titleAndDescription = $blogViewer->getBlogTitleAndDescription($_SESSION['username']);
      $posts = $blogViewer->getPosts($_SESSION['username'], 0);
      showView($titleAndDescription['title'], $titleAndDescription['description'], 0, $posts);
      break;

    case 'getHeaderCss':
      $blogViewer->getHeaderCss($_SESSION['username']);
      break;

    case 'getPosts':
      if (isset($_POST['request']['postOffset'])) {
        $posts = $blogViewer->getPosts($_SESSION['username'], $_POST['request']['postOffset']);
        echo $posts;
      }
  }
}
