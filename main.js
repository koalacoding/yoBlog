$(function() {
  var indexButtonsHandler = new IndexButtonsHandler();

	indexButtonsHandler.hideNonConnectedButtons();

	indexButtonsHandler.nonConnectedButtonsHandler();

  indexButtonsHandler.logoutButtonHandler();
});
