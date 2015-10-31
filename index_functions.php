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
    echo '<span class="loginAndRegisterButton" id="login_button">Login to an account</span>
          <span class="loginAndRegisterButton" id="register_button">Register a new account</span>

          <form id="login_form" action="login_action.php" method="post">
    				<div class="form_content">
    					Username <br />
    					<input type="text" class="form_field" name="username" />
    					<br /><br />
    					Password <br />
    					<input type="password" class="form_field" name="password" />
    					<br /><br />
    					<input id="OK" type="submit" value="OK" />
    				</div>
    			</form>

          <form id="register_form" action="login_action.php" method="post">
    				<div class="form_content">
    					Username <br />
    					<input type="text" class="form_field" name="username" />
    					<br /><br />
    					Password <br />
    					<input type="password" class="form_field" name="password" />
    					<br /><br />
              Password confirmation<br />
    					<input type="password" class="form_field" name="password_confirmation" />
    					<br /><br />
    					<input id="OK" type="submit" value="OK" />
    				</div>
    			</form>';
  }
