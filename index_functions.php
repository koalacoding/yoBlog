<?php
  /*----------------------------------------
  ------------------------------------------
  ---------------SHOW BUTTONS---------------
  ------------------------------------------
  ----------------------------------------*/


  /*------------------------------
  ------SHOW CONNECTED BUTTONS----
  ------------------------------*/

  function show_connected_buttons($username) {
    echo
      '<div id="top_block">
        <div id="right_buttons">
          <a href="manage_blog/manage_blog.php" class="right_buttons_element">Manage your blog</a>
          <a href="login/logout.php" class="right_buttons_element">Logout</a>
        </div>
      </div>';
  }

  /*------------------------------
  ---SHOW NOT CONNECTED BUTTONS---
  ------------------------------*/

  function show_not_connected_buttons() {
    echo
    '<div id="top_block">
      <div id="right_buttons">
        <a href="login/login.php" class="right_buttons_element">Login to an account</a>
        <a href="register/register.php" class="right_buttons_element">Register a new account</a>
      </div>
    </div>';
  }
