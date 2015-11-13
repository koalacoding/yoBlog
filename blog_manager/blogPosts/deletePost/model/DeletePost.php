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
      if (strlen($fetch['content']) > 40) {
        $fetch['content'] = substr($fetch['content'], 0, 40) . '...';
      }

      $tempString = '<tr>
                       <td class="deletePostPostDate">'.$fetch['postDate'].'</td>
                       <td>'.$fetch['title'].'</td>
                       <td>'.$fetch['content'].'</td>
                       <td><button class="deletePostButton">Delete</button>
                     </tr>';

      $string .= $tempString;
    }

    $request->closeCursor();

    return $string;
  }

  /*--------------------------------------
  ----------------------------------------
  --------------DELETE POST---------------
  ----------------------------------------
  --------------------------------------*/

  function deletePostAction($username, $postDate) {
	  require($_SERVER['DOCUMENT_ROOT'] . '/yoBlog/common/sql/connexion.php');

    $username = htmlentities($username, ENT_QUOTES);
    $postDate = htmlentities($postDate, ENT_QUOTES);

    $request = $bdd->prepare("DELETE FROM posts WHERE username=? AND postDate=?");
    $request->execute(array($username, $postDate));
    $request->closeCursor();

    echo 'ok';
  }
}
