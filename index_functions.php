<?php
  /*---------------------------------------------------
  -----------------------------------------------------
  ---------------HANDLE CONNECTED OR NOT---------------
  -----------------------------------------------------
  ---------------------------------------------------*/

  // Show a different content whether the user is connected or not.
  function handleConnectedOrNot($session) {
    if (isset($session['username'])) { // If the user is connected to an account.
      showConnectedButtons($session['username']);
    }

    else {
      showNotConnectedButtons();
    }    
  }


  /*----------------------------------------
  ------------------------------------------
  ---------------SHOW BUTTONS---------------
  ------------------------------------------
  ----------------------------------------*/


  /*------------------------------
  ------SHOW CONNECTED BUTTONS----
  ------------------------------*/

  function showConnectedButtons($username) {
    echo '<div id="loginAndRegisterButtons">
            <a href="manage_blog/manage_blog.php" class="right_buttons_element">Manage your blog</a>
            <a href="login/logout.php" class="right_buttons_element">Logout</a>
          </div>';
  }

  /*------------------------------
  ---SHOW NOT CONNECTED BUTTONS---
  ------------------------------*/

  function showNotConnectedButtons() {
    echo '<div id="loginAndRegisterButtons">
            <span class="loginAndRegisterButtons">Login to an account</span>
            <span class="loginAndRegisterButtons">Register a new account</span>
          </div>';
  }
