function BlogViewer() {
  this.showBlog = function() {
    $('#core').fadeOut(function() {
      $('#core').empty();

      $.post("blog_manager/blog_viewer/blog_viewer.php", function(data, status) {
        var blogManager = new BlogManager();

        $('#core').append(data);
        blogManager.modifyBackArrowTargetLink(blogManager.showBlogManager);
        $('#core').fadeIn();
        $('#back_arrow').fadeIn();
      });
    });
  }
}
