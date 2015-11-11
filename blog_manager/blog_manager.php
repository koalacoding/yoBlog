<?php
require($_SERVER['DOCUMENT_ROOT'] . '/yoBlog/include/session.php');

if (isset($_SESSION['username'])) { // If the user is connected.
  echo '<div class="buttonsContainer">
          <button class="index_button" id="view_blog_button">View your blog</button>
          <button class="index_button" id="manage_blog_posts_button">
            Manage your blog posts
          </button>
          <button class="index_button" id="manage_blog_options_button">
            Manage your blog options
          </button>
        </div>';
}
