<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/yoBlog/common/session/session.php');
require_once '../model/BlogViewer.php';
require_once '../view/view.php';

if (isset($_SESSION['username'], $_POST['requestType'])) {
  $blogViewer = new BlogViewer;
  $titleAndDescription = array();
  $posts = '';

  switch ($_POST['requestType']) {
    case 'showView':
      $titleAndDescription = $blogViewer->getBlogTitleAndDescription($_SESSION['username']);
      $posts = $blogViewer->getPosts($_SESSION['username']);
      showView($titleAndDescription['title'], $titleAndDescription['description'], $posts);
      break;

    case 'getHeaderCss':
      $blogViewer->getHeaderCss($_SESSION['username']);
      break;
  }
}
