<?php
class StartPage {
  /*-----------------------------------------------
  -------------------------------------------------
  ---------------SHOW COMMON CONTENT---------------
  -------------------------------------------------
  -----------------------------------------------*/


    /*---------------------------------
    ------SHOW COMMON CONTENT TOP------
    ---------------------------------*/

    function showCommonContentTop() {
      echo '<h1>PHP Blog</h1>
            <h2>An easy way to make your own blog.</h2>';
    }

    /*------------------------------------
    ------SHOW COMMON CONTENT BOTTOM------
    ------------------------------------*/

    function showCommonContentBottom() {
      echo '<div id="login_form" class="form">
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


  /*----------------------------------------
  ------------------------------------------
  ---------------SHOW BUTTONS---------------
  ------------------------------------------
  ----------------------------------------*/


    /*------------------------------------
    ------SHOW NON CONNECTED BUTTONS------
    ------------------------------------*/

    function showNonConnectedButtons() {
      echo '<div id="buttons">
              <button class="index_button" id="login_button">Login to an account</button>
              <button class="index_button" id="register_button">Register a new account</button>
            </div>';
    }

    /*--------------------------------
    ------SHOW CONNECTED BUTTONS------
    --------------------------------*/

    function showConnectedButtons() {
      echo '<div id="buttons">
              <button class="index_button" id="manage_your_blog_button">Manage your blog</button>
              <button class="index_button" id="logout_button">Logout</button>
            </div>';
    }
}
