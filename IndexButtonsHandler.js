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
    $('.form').fadeOut(function() {
      $('#buttons').fadeOut(function() {
        $('#buttons').empty(); // In case there was already buttons.
        $('#buttons').append(connectedButtons);
        $('#buttons').fadeIn();
      });
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


/*----------------------------------------------------
------------------------------------------------------
--------------HIDE NON CONNECTED BUTTONS--------------
------------------------------------------------------
----------------------------------------------------*/

this.hideNonConnectedButtons = function() {
  $('#login_form').hide();
  $('#register_form').hide();
  $('#login_error_message').hide();
}

/*-------------------------------------------
---------------------------------------------
--------------BUTTONS HANDLERS---------------
---------------------------------------------
-------------------------------------------*/


  /*--------------------------------------------
  ----------NON CONNECTED BUTTONS HANDLER-------
  --------------------------------------------*/

  this.nonConnectedButtonsHandler = function() {
    // Contrary of register is login, and vice-versa.
    function nonConnectedButtonsMiniHandler(loginOrRegister, contrary) {
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

    nonConnectedButtonsMiniHandler('login', 'register');
    nonConnectedButtonsMiniHandler('register', 'login');
  }
}
