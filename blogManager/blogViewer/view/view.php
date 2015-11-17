<?php
function showView($title, $description, $postOffset, $posts) {
  echo '<div class="jumbotron vertical-center">
          <div class="container">
            <h1>'.$title.'</h1>
            <p>'.$description.'</p>
          </div>
        </div>

        <div id="posts" data-post-offset="'.$postOffset.'">'.$posts.'</div>

        <div id="postsArrows">
          <div class="arrow" id="newerPostsArrow">
            <img src="http://image.noelshack.com/fichiers-sm/2015/47/1447723058-blackarrowleft.png">
          </div>

          <div class="arrow" id="olderPostsArrow">
            <img src="http://image.noelshack.com/fichiers/2015/47/1447722322-blackarrowright.png">
          </div>
        </div>';
}
