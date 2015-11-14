<?php
class AntiFlood {
  /*---------------------------------------
  ----------GET LAST REQUEST TIME----------
  ---------------------------------------*/

  function getLastRequestTime($ip) {
		require $_SERVER['DOCUMENT_ROOT'] . '/yoBlog/common/sql/connexion.php';

    $request = $bdd->prepare("SELECT last_request_time FROM anti_flood WHERE ip_address=?");
    $request->execute(array($ip));

    if ($request->rowCount() == 0) $fetch['last_request_time'] = 0; // If no result has been found
    else $fetch = $request->fetch();

    $request->closeCursor();

    return $fetch['last_request_time'];
  }

  /*---------------------------------------
  ----------SET LAST REQUEST TIME----------
  ---------------------------------------*/

  function setLastRequestTime($ip) {
		require $_SERVER['DOCUMENT_ROOT'] . '/yoBlog/common/sql/connexion.php';

    $request = $bdd->prepare("INSERT INTO anti_flood(ip_address, last_request_time) VALUES (?, ?)
                              ON DUPLICATE KEY UPDATE last_request_time = VALUES(last_request_time)");
    $request->execute(array($ip, time()));
    $request->closeCursor();
  }
}
