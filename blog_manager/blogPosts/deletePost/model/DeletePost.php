<?php
class DeletePost {
  /*------------------------------------
  --------------------------------------
  --------------GET POSTS---------------
  --------------------------------------
  ------------------------------------*/

  function getPosts($username) {
	  require($_SERVER['DOCUMENT_ROOT'] . '/yoBlog/common/sql/connexion.php');
    $fetch = array();
    $tempString = '';
    $string = '';

    $username = htmlentities($username, ENT_QUOTES);

    $request = $bdd->prepare("SELECT title, content, postDate FROM posts WHERE username=?
                            ORDER BY timeSinceEpoch DESC");
    $request->execute(array($username));

    while ($fetch = $request->fetch()) {
      // If the post's content is longer than 30 characters, we only keep the first 30 characters.
      if (strlen($fetch['content']) > 30) $fetch['content'] = substr($fetch['content'], 0, 30);

      $tempString = '<tr>
                       <td>'.$fetch['postDate'].'</td>
                       <td>'.$fetch['title'].'</td>
                       <td>'.$fetch['content'].'</td>
                       <td><button>Delete</button>
                     </tr>';

      $string .= $tempString;
    }

    return $string;
  }
}
