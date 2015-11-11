<?php
require($_SERVER['DOCUMENT_ROOT'] . '/php_blog/include/session.php');

if (isset($_SESSION['username'])) { // If the user is connected.
  echo '<button class="index_button">See your blog</button>
        <button class="index_button" id="manage_blog_articles_button">
          Manage your blog posts
        </button>
        <button class="index_button">Manage your blog options</button>';
}
