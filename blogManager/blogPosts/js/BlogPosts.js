function BlogPostsManager() {
  this.showBlogPostsManager = function() {
    $('#core').fadeOut(function() {
      $('#core').empty();

      $.post("blogManager/blogPosts/controller/controller.php", function(data, status) {
        var blogManager = new BlogManager();

        $('#core').append(data);
        blogManager.modifyBackArrowTargetLink(blogManager.showView);
        $('#core').fadeIn();
        $('#backArrow').fadeIn();
      });
    });
  }
}
