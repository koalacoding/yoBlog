<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="description" content="Start your own blog now ! Simple and fast.">

    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'
          type='text/css'>
    <link rel="stylesheet" type="text/css" href="css/index.css">

    <title>Your blog</title>
  </head>

  <body>
    <div id="header"></div>

    <div id="core">
      <h1>PHP Blog</h1>
      <h2>An easy way to make your own blog.</h2>

      <div id="buttons">
      <?php
        require_once('IndexButtonsHandler.php');
        $indexButtonsHandler = new IndexButtonsHandler;
        $indexButtonsHandler->handleConnectedOrNotButtons();
      ?>
      </div>

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
      </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="main.js"></script>
    <script src="IndexButtonsHandler.js"></script>
    <script src="login/LoginHandler.js"></script>
    <script src="logout/logoutHandler.js"></script>
    <script src="register/RegistrationHandler.js"></script>
  </body>
</html>
