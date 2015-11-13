function LogoutHandler() {
  this.logoutOnLogoutButtonClick = function() {
    var startPageButtonsHandler = new StartPageButtonsHandler;

    $.post("logout/logout.php",
            function(data) {
              if (data == 'disconnected') { // If the user disconnected successfully.
                startPageButtonsHandler.showNotConnectedButtons();
              }

              else {
                alert('Error during disconnection.');
              }
            }
    );
  }
}
