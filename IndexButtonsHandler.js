function IndexButtonsHandler() {
/* Used to prevent the user to show both the register and login forms
  by clicking too fast on both of the buttons. */
var allowClick = true;


/*--------------------------------------
----------------------------------------
--------------SHOW BUTTONS--------------
----------------------------------------
--------------------------------------*/


  /*-------------------------------------
  ----------SHOW CONNECTED BUTTONS-------
  -------------------------------------*/

  this.showConnectedButtons = function() {
    var connectedButtons = '<button class="index_button" id="manage_your_blog_button">\
                              Manage your blog\
                            </button>\
                            <button class="index_button" id="logout_button">Logout</button>';

    $('#buttons').fadeOut();
    $('#login_form').fadeOut();
    $('#register_form').fadeOut(function() {
      $('.form input').val('');

      setTimeout(function() {
        $('#buttons').empty(); // In case there was already buttons.
        $('#buttons').append(connectedButtons);
        $('#buttons').fadeIn();
      }, 500);
    });
  }

  /*-------------------------------------
  ----------SHOW CONNECTED BUTTONS-------
  -------------------------------------*/

  this.showNotConnectedButtons = function() {
    var notConnectedButtons = '<button class="index_button" id="login_button">\
                                 Login to an account\
                               </button>\
                               <button class="index_button" id="register_button">\
                                 Register a new account\
                               </button>';
    $('#buttons').fadeOut(function() {
      $('#buttons').empty(); // In case there was already buttons.
      $('#buttons').append(notConnectedButtons);
      $('#buttons').fadeIn();
    });
  }


/*-------------------------------------------
---------------------------------------------
--------------BUTTONS HANDLERS---------------
---------------------------------------------
-------------------------------------------*/


  /*---------------------------------------------------------
  -----------------------------------------------------------
  --------------NON CONNECTED BUTTONS HANDLERS---------------
  -----------------------------------------------------------
  ---------------------------------------------------------*/

  this.nonConnectedButtonsHandler = function() {
    this.loginAndRegisterButtonsHandler();
    this.loginFormSubmitButtonHandler();
    this.registerFormSubmitButtonHandler();
  }


    /*----------------------------------------------------
    ----------LOGIN AND REGISTER BUTTONS HANDLER----------
    ----------------------------------------------------*/

    this.loginAndRegisterButtonsHandler = function() {
      // Contrary of register is login, and vice-versa.
      function loginAndRegisterButtonsMiniHandler(loginOrRegister, contrary) {
        $(document).on('click', '#'+loginOrRegister+'_button', function() {
          // If there is no animation executing.
          if (allowClick == true) {
            allowClick = false;
            // When the contrary form has fade out, we start to fade in the right form.
            $('#'+loginOrRegister+'_button').css('box-shadow', 'rgba(0, 0, 0, 0.4) 0px 0px 40px 0px');
            $('#'+contrary+'_button').css('box-shadow', 'rgba(0, 80, 0, 0.4) 0px 0px 10px 0px');

            $('#'+contrary+'_form').fadeOut(function() {
              if ($('#'+contrary+'_form').css('display') == 'none') {
                $('#'+loginOrRegister+'_form').fadeIn(
                  function() {
                    allowClick = true; // When every animation is finished, we allow the user to click.
                  });
              }
            });
          }
        });
      }

      loginAndRegisterButtonsMiniHandler('login', 'register');
      loginAndRegisterButtonsMiniHandler('register', 'login');
    }

    /*--------------------------------------------------
    ----------LOGIN FORM SUBMIT BUTTON HANDLER----------
    --------------------------------------------------*/

    this.loginFormSubmitButtonHandler = function() {
      var loginHandler = new LoginHandler();

      $('#login_form_submit_button').click(function() {
        loginHandler.login();
      });
    }

    /*-----------------------------------------------------
    ----------REGISTER FORM SUBMIT BUTTON HANDLER----------
    -----------------------------------------------------*/

    this.registerFormSubmitButtonHandler = function() {
      var registrationHandler = new RegistrationHandler;

      $('#register_form_submit_button').click(function() {
        registrationHandler.register();
    	});
    }


  /*-----------------------------------------------------
  -------------------------------------------------------
  --------------CONNECTED BUTTONS HANDLERS---------------
  -------------------------------------------------------
  -----------------------------------------------------*/

  this.connectedButtonsHandler = function() {
    this.manageBlogButtonHandler();
    this.logoutButtonHandler();
  }


    /*--------------------------------------------
    ----------MANAGE BLOG BUTTON HANDLER----------
    --------------------------------------------*/

    this.manageBlogButtonHandler = function() {
      var manageBlogHandler = new ManageBlogHandler();

      $(document).on('click', '#manage_your_blog_button', function() {
        manageBlogHandler.showMain();
      });
    }

    /*---------------------------------------
    ----------LOGOUT BUTTON HANDLER----------
    ---------------------------------------*/

    this.logoutButtonHandler = function() {
      var logoutHandler = new LogoutHandler;

      $(document).on('click', '#logout_button', function() {
        logoutHandler.logoutOnLogoutButtonClick();
      });
    }
}

$(function() {
  var indexButtonsHandler = new IndexButtonsHandler();

	indexButtonsHandler.nonConnectedButtonsHandler();
  indexButtonsHandler.connectedButtonsHandler();
});
