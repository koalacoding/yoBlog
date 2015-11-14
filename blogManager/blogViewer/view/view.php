<?php
function showView($title, $description, $posts) {
  echo '<div class="jumbotron vertical-center">
          <div class="container">
            <h1>'.$title.'</h1>
            <p>'.$description.'</p>
          </div>
        </div>

        <div id="posts">'.$posts.'</div>';
}
