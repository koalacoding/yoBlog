<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/yoBlog/common/antiFlood/model/AntiFlood.php';

$antiFlood = new AntiFlood;
$ip = $_SERVER['REMOTE_ADDR'];
$firstRequestTime =  $antiFlood->getFirstRequestTime($ip);
$numberOfRequests = $antiFlood->getNumberOfRequests($ip);

/* If the time since the first request is greater than x milliseconds,
   the user can make a new request. */
if (round(microtime(true) * 1000) - $firstRequestTime >= 200) {
  // We reset the time of the first request and the number of requests the IP did.
  $antiFlood->resetFirstRequestTime($ip);
}

else { // If the time since the first request is less than x milliseconds.
  // If the IP made more than x requests in the last x milliseconds.
  if ($numberOfRequests == 1) {
   die();
  }

  else { // If the user can make a new request.
    $antiFlood->incrementNumberOfRequests($ip);
  }
}
