function Register() {
  this.register = function() {
    var username = $('[name="username"]').val();
    var password = $('[name="password"]').val();
    var passwordConfirmation = $('[name="passwordConfirmation"]').val();

    $.post("startPage/register/controller/controller.php",
      {
        username: username,
        password: password,
        passwordConfirmation: passwordConfirmation
      },
      function(data, status) {
        if (data == 'ok') {
          var login = new Login;

          login.login(username, password);
        }

        else {
          // In case the user press the button too fast too many times.
          $('.errorMessage').stop(true);
          
          $('.errorMessage').hide(0, function() {
            $('.errorMessage').text(data).fadeIn().delay(1000).fadeOut();
          });
        }
    });
  }
}
