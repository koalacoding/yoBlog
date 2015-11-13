function Login() {
  this.login = function() {
    var username = $('[name="username"]').val();
    var password = $('[name="password"]').val();

    $.post("startPage/login/controller/controller.php", {username: username, password: password},
      function(data, status) {
       if (data == 'ok') {
         var startPage = new StartPage();
         startPage.showConnectedButtons();
       }

       else { // If there is an error.
         $('.errorMessage').hide(0, function() {
           $('.errorMessage').text('Wrong credentials').fadeIn().delay(1000).fadeOut();
         });
       }
    });
  }
}
