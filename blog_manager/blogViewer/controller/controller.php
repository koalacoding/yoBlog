<?php
require_once '../model/BlogViewer.php';
require_once '../view/view.php';

if (isset($_POST['requestType'])) {
  $blogViewer = new BlogViewer;

  switch ($_POST['requestType']) {
    case 'showView':
      $blogViewer = $blogViewer->getBlogTitleAndDescription('admin');
      showView($blogViewer['title'], $blogViewer['description']);
      break;

    case 'getHeaderCss':
      $blogViewer->getHeaderCss('admin');
      break;
  }
}
