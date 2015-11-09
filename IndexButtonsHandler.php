<?php
class IndexButtonsHandler {

/*-----------------------------------------------------------
-------------------------------------------------------------
---------------HANDLE CONNECTED OR NOT BUTTONS---------------
-------------------------------------------------------------
-----------------------------------------------------------*/

// Show connected or not connected buttons whether the user is connected or not.
function handleConnectedOrNotButtons() {
  require($_SERVER['DOCUMENT_ROOT'] . '/php_blog/include/session.php');
  if (isset($_SESSION['username'])) $this->showConnectedButtons(); // If the user is connected.

  else $this->showNotConnectedButtons();
}


/*----------------------------------------
------------------------------------------
---------------SHOW BUTTONS---------------
------------------------------------------
----------------------------------------*/


  /*------------------------------
  ------SHOW CONNECTED BUTTONS----
  ------------------------------*/

  private function showConnectedButtons() {
    echo '<button class="index_button" id="manage_your_blog_button">Manage your blog</button>
          <button class="index_button" id="logout_button">Logout</button>';
  }

  /*------------------------------
  ---SHOW NOT CONNECTED BUTTONS---
  ------------------------------*/

  private function showNotConnectedButtons() {
    echo '<button class="index_button" id="login_button">Login to an account</button>
          <button class="index_button" id="register_button">Register a new account</button>';
  }
}
