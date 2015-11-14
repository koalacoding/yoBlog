<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/yoBlog/common/antiFlood/model/AntiFlood.php';

$antiFlood = new AntiFlood;
$ip = $_SERVER['REMOTE_ADDR'];
$firstRequestTime =  $antiFlood->getFirstRequestTime($ip);
$numberOfRequests = $antiFlood->getNumberOfRequests($ip);

if (time() - $firstRequestTime >= 2) { // If the time since the first request is greater than 1s.
  $antiFlood->resetFirstRequestTime($ip); // We reset the number of requests the IP did.
}

else { // If the time since the first request is less than 1s.
  // If the IP made more than 5 requests in the last second.
  if ($numberOfRequests > 5) {
   die();
  }

  else { // If the user can make a new request.
    $antiFlood->incrementNumberOfRequests($ip);
  }
}
