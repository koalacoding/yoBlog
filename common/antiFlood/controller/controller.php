<?php
if (isset($ip)) {
  require_once $_SERVER['DOCUMENT_ROOT'] . '/yoBlog/common/antiFlood/model/AntiFlood.php';

  $antiFlood = new AntiFlood;
  $lastRequestTime = $antiFlood->getLastRequestTime($ip);

  // If the time since the last request is less than 500 milliseconds.
  if ((time() - $lastRequestTime) < 0.5) {
    die();
  }

  else { // If the user can make the new request.
    $antiFlood->setLastRequestTime($ip);
  }
}
