function confirmRegistrationHandler() {
	$('#register_form_submit_button').click(function() {
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
								alert('Registered with succes.');
							}

							else {
								// In case the user press the button too fast too many times.
								$('#register_error_message').stop(true);
								$('#register_error_message').text(data).fadeIn().delay(1000).fadeOut();
							}
		});
	});
}
