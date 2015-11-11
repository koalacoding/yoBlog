<?php
class BlogOptionsManager {
  /*------------------------------------
  --------------------------------------
  --------------SHOW CORE---------------
  --------------------------------------
  ------------------------------------*/

  function showContent() {
    echo '<div id="blog_options_manager_form">
            <span>Blog title :</span>
            <br />
            <input type="text" class="form_field" name="blog_title">
            <br />
            <br />
            <span>Blog description :</span>
            <br />
            <input type="text" class="form_field" name="blog_description">
            <br />
            <br />
            <div style="margin-bottom: -10px;">Blog title and description color :</div>
            <br />
            <input id="blog_options_colorpicker">
            <br />
            <br />
            <br />
            <button id="confirmBlogOptionsManagerFormButton">OK</button>
            <br />
            <br />
            <span id="blogOptionsUpdateResult"></span>
          </div>';
  }

  /*----------------------------------------------
  ------------------------------------------------
  --------------UPDATE BLOG OPTIONS---------------
  ------------------------------------------------
  ----------------------------------------------*/

  function updateBlogOptions($title, $description, $titleAndDescriptionColor, $username) {
		require($_SERVER['DOCUMENT_ROOT'] . '/yoBlog/sql/sql_connexion.php');

    $title = htmlspecialchars($title);
    $description = htmlspecialchars($description);
    $titleAndDescriptionColor = htmlspecialchars($titleAndDescriptionColor);

		$request = $bdd->prepare("UPDATE blog_options SET title=?, description=?,
                                                      titleAndDescriptionColor=?
                              WHERE username=?");
    $request->execute(array($title, $description, $titleAndDescriptionColor, $username));
    $request->closeCursor();

    echo 'ok';
  }
}
