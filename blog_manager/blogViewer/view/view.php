<?php
function showView($title, $description) {
  echo '<div class="jumbotron vertical-center">
          <div class="container">
            <h1>'.$title.'</h1>
            <p>'.$description.'</p>
          </div>
        </div>

        <div class="container">
          <p>This is another paragraphee.</p>
          <p>This is a paragraph.</p>
          <p>This is another paragraph.</p>
        </div>';
}
