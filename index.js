/* Used to prevent the user to show both the register and login forms
	by clicking too fast on both of the buttons. */
var allowClick = true;

/*-------------------------------------
---------------------------------------
--------------HIDE FORMS---------------
---------------------------------------
-------------------------------------*/

function hideElements() {
	$('#login_form').hide();
	$('#register_form').hide();
	$('#login_error_message').hide();
}

/*---------------------------------------
-----------------------------------------
--------------BUTTON CLICK---------------
-----------------------------------------
---------------------------------------*/


	/*-----------------------------------
	----------HANDLE BUTTONS CLICK-------
	-----------------------------------*/

	// Contrary is register when login, and login when register.
	function handleButtonsClick(loginOrRegister, contrary) {
		$('#'+loginOrRegister+'_button').click(function() {
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

	/*---------------------------------------------
	----------LOGIN FORM SUBMIT BUTTON CLICK-------
	---------------------------------------------*/

	function loginFormSubmitButtonClick() {
		$('#login_form_submit_button').click(function() {
			var username = $('[name="login_username"]').val();
			var password = $('[name="login_password"]').val();
			$.post("login/login.php",
							{
							  username: username,
								password: password
							},
							function(data, status){
							  if (data == 'ok') {
									alert('ok');
								}

								else {
									// In case the user press the button too fast too many times.
									$('#login_error_message').stop(true);
									$('#login_error_message').text('Wrong credentials').fadeIn().delay(1000).fadeOut();
								}
			});
		});
	}

	/*------------------------------------------------
	----------REGISTER FORM SUBMIT BUTTON CLICK-------
	------------------------------------------------*/

	function registerFormSubmitButtonClick() {
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

/*--------------------------------
----------------------------------
---------------MAIN---------------
----------------------------------
--------------------------------*/

$(function() {
	hideElements();

	handleButtonsClick('login', 'register');
	handleButtonsClick('register', 'login');

	loginFormSubmitButtonClick();
	registerFormSubmitButtonClick();
});
