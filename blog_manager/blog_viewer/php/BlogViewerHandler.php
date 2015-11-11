<?php
require_once 'BlogViewer.php';

if (isset($_POST['requestType'])) {
  $blogViewer = new BlogViewer;

  switch ($_POST['requestType']) {
    case 'showBlog':
      $blogOptions = $blogViewer->getBlogOptions('admin');

      $blogViewer->showBlog($blogOptions['title'], $blogOptions['description']);
      break;
    case 'getTitleAndDescriptionColor':
      $blogViewer->getTitleAndDescriptionColor('admin');
      break;
  }
}
