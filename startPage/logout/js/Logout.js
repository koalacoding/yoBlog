function Logout() {
  this.logout = function() {
    $.post("startPage/logout/controller/controller.php",
      function(data) {
        if (data == 'disconnected') { // If the user disconnected successfully.
          var startPage = new StartPage();
          startPage.showNotConnectedButtons();
        }

        else {
          alert('Error trying to disconnect.');
        }
      }
    );
  }
}
