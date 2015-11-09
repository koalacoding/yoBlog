function LoginHandler() {

this.confirmLoginHandler = function() {
  var indexButtonsHandler = new IndexButtonsHandler;

	$('#login_form_submit_button').click(function() {
		var username = $('[name="login_username"]').val();
		var password = $('[name="login_password"]').val();
		$.post("login/login.php",
						{
						  username: username,
							password: password
						},
						function(data, status) {
              if (data == 'ok') {
                indexButtonsHandler.showConnectedButtons();
              }

						  else { // If the credentials are wrong or if there is an error.
								// In case the user press the button too fast too many times.
								$('#login_error_message').stop(true);
								$('#login_error_message').text('Wrong credentials').fadeIn().delay(1000).fadeOut();
						}
		});
	});
}

}
