/*-------------------------------------------------------------------
---------------------------------------------------------------------
---------------HANDLE LOGIN AND REGISTER BUTTONS CLICK---------------
---------------------------------------------------------------------
-------------------------------------------------------------------*/

function handleLoginAndRegisterButtonsClick() {
	$('.loginAndRegisterButtons').click(function() {
		$(this).fadeOut();
	});
}

/*--------------------------------
----------------------------------
---------------MAIN---------------
----------------------------------
--------------------------------*/

$(function() {
	handleLoginAndRegisterButtonsClick();
});