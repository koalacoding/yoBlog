<?php
class SearchBar {
  function searchBlog($string) { // Search blogs in the SQL DB containing a specific string.
		require($_SERVER['DOCUMENT_ROOT'] . '/yoBlog/common/sql/connexion.php');

    $array = array();

    $string = htmlentities($string, ENT_QUOTES);

    $request = $bdd->prepare("SELECT username FROM users WHERE username LIKE ?");
    $request->execute(array('%'.$string.'%'));
    while ($fetch = $request->fetch()) {
      array_push($array, $fetch['username']);
    }

    return $array;
  }
}
