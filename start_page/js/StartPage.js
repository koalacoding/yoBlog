function StartPage() {
  this.showStartPage = function() {
    $.post("start_page/php/start_page_handler.php",
           function(data, status) {
             $('#back_arrow').fadeOut();
             $('#core').fadeOut(function() {
               $('#core').empty();
               $('#core').append(data);
               $('#core').fadeIn();
             });
           }
    );
  }
}
