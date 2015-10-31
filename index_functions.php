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

          <div id="login_form" class="form">
    				<div class="form_content">
    					Username <br />
    					<input type="text" class="form_field" name="login_username" />
    					<br /><br />
    					Password <br />
    					<input type="password" class="form_field" name="login_password" />
    					<br /><br />
    					<button id="login_form_submit_button">OK</button>
    				</div>

            <p id="login_error_message" style="color: red;"></p>
    			</div>

          <div id="register_form" class="form">
    				<div class="form_content">
    					Username <br />
    					<input type="text" class="form_field" name="register_username" />
    					<br /><br />
    					Password <br />
    					<input type="password" class="form_field" name="register_password" />
    					<br /><br />
              Password confirmation<br />
    					<input type="password" class="form_field" name="register_password_confirmation" />
    					<br /><br />
    					<button id="register_form_submit_button">OK</button>
    				</div>

            <p id="register_error_message" style="color: red;"></p>
    			</div>';
  }
