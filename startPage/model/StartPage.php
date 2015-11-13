<?php
class StartPage {
  /*-------------------------------------
  ---------------------------------------
  ---------------GET FORMS---------------
  ---------------------------------------
  -------------------------------------*/


  /*------------------------
  ------GET LOGIN FORM------
  ------------------------*/

  function getLoginForm() {
    return '<div id="loginForm" class="form">
              <div class="formContent">
                Username
                <br />
                <input type="text" class="formField" name="username" />
                <br />
                <br />
                Password
                <br />
                <input type="password" class="formField" name="password" />
                <br />
                <br />
                <button id="loginFormButton">OK</button>
              </div>

              <div class="errorMessage"></div>
            </div>';
  }

  /*------------------------
  ------GET LOGIN FORM------
  ------------------------*/

  function getRegisterForm() {
    return '<div id="registerForm" class="form">
              <div class="formContent">
                Username
                <br />
                <input type="text" class="formField" name="username" />
                <br />
                <br />
                Password
                <br />
                <input type="password" class="formField" name="password" />
                <br />
                <br />
                Password confirmation
                <br />
                <input type="password" class="formField" name="passwordConfirmation" />
                <br />
                <br />
                <button id="registerFormButton">OK</button>
              </div>

              <div class="errorMessage"></div>
            </div>';
  }


  /*---------------------------------------
  -----------------------------------------
  ---------------GET BUTTONS---------------
  -----------------------------------------
  ---------------------------------------*/


    /*-----------------------------------
    ------GET NOT CONNECTED BUTTONS------
    -----------------------------------*/

    function getNotConnectedButtons() {
      return '<button class="commonButton" id="loginButton">Login to an account</button>
              <button class="commonButton" id="registerButton">Register a new account</button>';
    }

    /*-------------------------------
    ------GET CONNECTED BUTTONS------
    -------------------------------*/

    function getConnectedButtons() {
      return '<button class="commonButton" id="manageBlogButton">Manage your blog</button>
              <button class="commonButton" id="logoutButton">Logout</button>';
    }
}
