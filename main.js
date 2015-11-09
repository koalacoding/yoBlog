$(function() {
  var indexButtonsHandler = new IndexButtonsHandler();

	indexButtonsHandler.hideNonConnectedButtons();

	indexButtonsHandler.nonConnectedButtonsHandler();

	var loginHandler = new LoginHandler();
  loginHandler.confirmLoginHandler();

  var logoutHandler = new LogoutHandler();
  logoutHandler.logoutOnLogoutButtonClick();

	confirmRegistrationHandler();
});
