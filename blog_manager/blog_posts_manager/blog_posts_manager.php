<?php
require($_SERVER['DOCUMENT_ROOT'] . '/yoBlog/include/session.php');

if (isset($_SESSION['username'])) { // If the user is connected.
  echo '<div id="blog_posts_manager">
          <button class="index_button">New blog post</button>
          <button class="index_button">Modify a blog post</button>
          <button class="index_button">Delete a blog post</button>
        </div>';
}
