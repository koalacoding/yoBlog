function actionResult(dataReceived, resultWanted) {
  if (dataReceived == resultWanted) {
    $('#actionResult').hide(function() {
      $('#actionResult').css('color', '#00AA00');
      $('#actionResult').text('Success');
      $('#actionResult').fadeIn().delay(1000).fadeOut();
    });
  }

  else {
    $('#actionResult').hide(function() {
      $('#actionResult').css('color', '#AA0000');
      $('#actionResult').text('Error');
      $('#actionResult').fadeIn().delay(1000).fadeOut();
    });
  }
}
