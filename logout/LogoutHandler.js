function LogoutHandler() {

this.logoutOnLogoutButtonClick = function() {
  var indexButtonsHandler = new IndexButtonsHandler;

  $.post("logout/logout.php",
          function(data) {
            if (data == 'disconnected') { // If the user disconnected successfully.
              indexButtonsHandler.showNotConnectedButtons();
            }

            else {
              alert('Error during disconnection.');
            }
          }
  );
}

}
