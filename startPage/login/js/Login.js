function Login() {
  this.login = function(username, password) {
    username = $('[name="username"]').val();
    password = $('[name="password"]').val();

    $.post("startPage/login/controller/controller.php", {username: username, password: password},
      function(data, status) {
       if (data == 'ok') {
         var startPage = new StartPage();
         startPage.showConnectedButtons();
       }

       else { // If there is an error.
         // In case the user press the button too fast too many times.
         $('.errorMessage').stop(true);
         
         $('.errorMessage').hide(0, function() {
           $('.errorMessage').text('Wrong credentials').fadeIn().delay(1000).fadeOut();
         });
       }
    });
  }
}
