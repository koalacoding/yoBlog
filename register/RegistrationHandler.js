function RegistrationHandler() {

this.register = function() {
    var username = $('[name="register_username"]').val();
    var password = $('[name="register_password"]').val();
    var passwordConfirmation = $('[name="register_password_confirmation"]').val();

    $.post("register/register.php",
            {
              username: username,
              password: password,
              password_confirmation: passwordConfirmation
            },
            function(data, status){
              if (data == 'ok') {
                var loginHandler = new LoginHandler;
                
                /* Putting the freshly registered username and password in the login fields
                   so the LoginHandler can use them to login. */
                $('[name="login_username"]').val(username);
                $('[name="login_password"]').val(password);
                loginHandler.login();
              }

              else {
                // In case the user press the button too fast too many times.
                $('#register_error_message').stop(true);
                $('#register_error_message').text(data).fadeIn().delay(1000).fadeOut();
              }
    });
}

}
