function BlogViewer() {
  this.showBlog = function() {
    $('#core').fadeOut(function() {
      var requestType = 'showBlog';
      $('#core').empty();

      $.post("blog_manager/blog_viewer/php/BlogViewerHandler.php", {requestType: requestType},
        function(data, status) {
          var blogManager = new BlogManager();

          $('#core').append(data);

          requestType = 'getTitleAndDescriptionColor';
          $.post("blog_manager/blog_viewer/php/BlogViewerHandler.php", {requestType: requestType},
            function(data, status) {
              $('.jumbotron').css('color', data);
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
