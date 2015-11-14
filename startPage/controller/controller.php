<?php
if (isset($_POST['requestType'])) {
  require_once($_SERVER['DOCUMENT_ROOT'] . '/yoBlog/common/session/session.php');
  require_once '../model/StartPage.php';
  require_once '../view/view.php';

  $startPage = new StartPage;

  switch($_POST['requestType']) {
    case 'showView':
      if (isset($_SESSION['username'])) { // If the user is connected.
        $buttons = $startPage->getConnectedButtons();
      }

      else { // If the user is not connected.
        $buttons = $startPage->getNotConnectedButtons();
      }

      showView($buttons);

      break;

    case 'getConnectedButtons':
      if (isset($_SESSION['username'])) {
        $buttons = $startPage->getConnectedButtons();
        echo $buttons;
      }

      break;

    case 'getNotConnectedButtons':
      if (!isset($_SESSION['username'])) { // If the user is not connected.
        $buttons = $startPage->getNotConnectedButtons();
        echo $buttons;
      }

      break;

    case 'getLoginForm':
      if (!isset($_SESSION['username'])) { // If the user is not connected.
        $form = $startPage->getLoginForm();
        echo $form;
      }

    break;

    case 'getRegisterForm':
      if (!isset($_SESSION['username'])) { // If the user is not connected.
        $form = $startPage->getRegisterForm();
        echo $form;
      }

    break;
  }
}
