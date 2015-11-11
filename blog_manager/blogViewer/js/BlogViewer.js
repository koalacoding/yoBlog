function BlogViewer() {
  this.showView = function() {
    $('#core').fadeOut(function() {
      var requestType = 'showView';
      $('#core').empty();

      $.post("blog_manager/blogViewer/controller/controller.php", {requestType: requestType},
        function(data, status) {
          var blogManager = new BlogManager();

          $('#core').append(data);

          requestType = 'getHeaderCss';
          $.post("blog_manager/blogViewer/controller/controller.php", {requestType: requestType},
            function(data, status) {
              alert(data);
              data = data.split(";");
              alert(data[0]);
              alert(data[1]);
              $('.jumbotron').css('background', 'url("'+data[0]+'")');
              $('.jumbotron').css('color', data[1]);
            }
          );

          blogManager.modifyBackArrowTargetLink(blogManager.showBlogManager);

          $('#core').fadeIn();
          $('#back_arrow').fadeIn();
        }
      );
    });
  }
}
