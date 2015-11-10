<?php
require($_SERVER['DOCUMENT_ROOT'] . '/php_blog/include/session.php');

if (isset($_SESSION['username'])) { // If the user is connected.
  echo '<button class="index_button">New blog post</button>
        <button class="index_button">Modify a blog post</button>
        <button class="index_button">Delete a blog post</button>';
}
