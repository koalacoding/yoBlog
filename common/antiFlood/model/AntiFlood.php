<?php
class AntiFlood {
  /*---------------------------------------
  -----------------------------------------
  --------------FIRST REQUEST--------------
  -----------------------------------------
  ---------------------------------------*/


    /*----------------------------------------
    ----------GET FIRST REQUEST TIME----------
    ----------------------------------------*/

    function getFirstRequestTime($ip) {
  		require $_SERVER['DOCUMENT_ROOT'] . '/yoBlog/common/sql/connexion.php';

      $request = $bdd->prepare("SELECT first_request_time FROM anti_flood WHERE ip_address=?");
      $request->execute(array($ip));

      // If no result has been found
      if ($request->rowCount() == 0) $fetch['first_request_time'] = 0;
      else $fetch = $request->fetch();

      $request->closeCursor();

      return intval($fetch['first_request_time']);
    }

    /*------------------------------------------
    ----------RESET FIRST REQUEST TIME----------
    ------------------------------------------*/

    function resetFirstRequestTime($ip) {
  		require $_SERVER['DOCUMENT_ROOT'] . '/yoBlog/common/sql/connexion.php';

      $request = $bdd->prepare("INSERT INTO anti_flood(ip_address, first_request_time,
                                                       number_of_requests)
                                VALUES (?, ?, ?) ON DUPLICATE KEY
                                UPDATE first_request_time = VALUES(first_request_time),
                                number_of_requests = VALUES(number_of_requests)");
      // Using round(microtime(true) * 1000) to get Unix timestamp in milliseconds.
      $request->execute(array($ip, round(microtime(true) * 1000), 1));
      $request->closeCursor();
    }


  /*----------------------------------------
  ----------GET NUMBER OF REQUESTS----------
  ----------------------------------------*/

  function getNumberOfRequests($ip) { // Number of requests the IP did in the last second.
    require $_SERVER['DOCUMENT_ROOT'] . '/yoBlog/common/sql/connexion.php';

    $request = $bdd->prepare("SELECT number_of_requests FROM anti_flood WHERE ip_address=?");
    $request->execute(array($ip));

    // If no result has been found.
    if ($request->rowCount() == 0) $fetch['number_of_requests'] = 0;
    else $fetch = $request->fetch();

    $request->closeCursor();

    return $fetch['number_of_requests'];
  }


  /*----------------------------------------------
  ----------INCREMENT NUMBER OF REQUESTS----------
  ----------------------------------------------*/

  function incrementNumberOfRequests($ip) {
    require $_SERVER['DOCUMENT_ROOT'] . '/yoBlog/common/sql/connexion.php';

    $request = $bdd->prepare("UPDATE anti_flood SET number_of_requests = number_of_requests + 1
                              WHERE ip_address = ?");
    $request->execute(array($ip));
  }
}
