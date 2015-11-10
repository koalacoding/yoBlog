$(function() {
  $.getScript("start_page/js/StartPage.js", function() {
    $.getScript("start_page/js/StartPageButtonsHandler.js", function() {
      var startPage = new StartPage();
      var startPageButtonsHandler = new StartPageButtonsHandler();

      startPage.showStartPage();

      startPageButtonsHandler.nonConnectedButtonsHandler();
      startPageButtonsHandler.connectedButtonsHandler();
    });
  });


});
