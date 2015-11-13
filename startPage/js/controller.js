$(function() {
  var startPage = new StartPage();
  var login = new Login();
  var registrationHandler = new RegistrationHandler();

  startPage.showView(); // When the user first enters.

  /*------------------------------------------------------
  --------------------------------------------------------
  ---------------LOGIN AND REGISTER BUTTONS---------------
  --------------------------------------------------------
  ------------------------------------------------------*/

  $(document).on('click', '#loginButton', function() {
    startPage.showForm('Login'); // First letter must be capitalized for 'getLoginForm'.
  });

  $(document).on('click', '#registerButton', function() {
    startPage.showForm('Register');
  });


  /*----------------------------------------
  ------------------------------------------
  ---------------FORM BUTTONS---------------
  ------------------------------------------
  ----------------------------------------*/

  $(document).on('click', '#loginFormButton', function() {
    login.login();
  });

  $(document).on('click', '#registerFormButton', function() {
    registrationHandler.register();
	});


    /*------------------------------------------------------
    ----------CONFIRM FORMS WITH ENTER KEY HANDLER----------
    ------------------------------------------------------*/

    $(document).on('keydown', function(event) {
      if (event.keyCode == 13) { // If the user presses the Enter key.
        if ($('#loginFormButton').length) { // If the login form is visible.
          login.login();
        }

        else if ($('#registerFormButton').length) {
          registrationHandler.register();
        }
      }
    });
});
