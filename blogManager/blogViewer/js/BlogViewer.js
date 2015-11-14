function BlogViewer() {
  this.showView = function() {
    $('#core').fadeOut(function() {
      var requestType = 'showView';
      $('#core').empty();

      $.post("blogManager/blogViewer/controller/controller.php", {requestType: requestType},
        function(data, status) {
          var blogManager = new BlogManager();

          $('#core').append(data);

          requestType = 'getHeaderCss';
          $.post("blogManager/blogViewer/controller/controller.php", {requestType: requestType},
            function(data, status) {
              data = data.split(";");
              $('.jumbotron').css('background', 'url("'+data[0]+'")');
              $('.jumbotron').css('color', data[1]);
            }
          );

          blogManager.modifyBackArrowTargetLink(blogManager.showView);

          $('#core').fadeIn();
          $('#backArrow').fadeIn();
        }
      );
    });
  }
}
