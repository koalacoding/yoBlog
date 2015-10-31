/* Used to prevent the user to show both the register and login forms
	by clicking too fast on both of the buttons. */
var allowClick = true;

/*-------------------------------------
---------------------------------------
--------------HIDE FORMS---------------
---------------------------------------
-------------------------------------*/

function hideForms() {
	$('#login_form').hide();
	$('#register_form').hide();
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


/*--------------------------------
----------------------------------
---------------MAIN---------------
----------------------------------
--------------------------------*/

$(function() {
	hideForms();

	handleButtonsClick('login', 'register');
	handleButtonsClick('register', 'login');
});
