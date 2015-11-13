function actionResult(dataReceived, resultWanted) {
  if (dataReceived == resultWanted) {
    $('#actionResult').css('color', '#00AA00');
    $('#actionResult').text('Success');
    $('#actionResult').animate({opacity: 1}, 500).delay(1000).animate({opacity: 0}, 500);
  }

  else {
    $('#actionResult').css('color', '#AA0000');
    $('#actionResult').text('Error');
    $('#actionResult').animate({opacity: 1}, 500).delay(1000).animate({opacity: 0}, 500);
  }
}
