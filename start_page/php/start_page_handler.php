<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/php_blog/include/session.php');
require_once('StartPage.php');

$startPage = new StartPage;
$startPage->showCommonContentTop();

if (isset($_SESSION['username'])) $startPage->showConnectedButtons(); // If the user is connected.
else $startPage->showNonConnectedButtons();

$startPage->showCommonContentBottom();
