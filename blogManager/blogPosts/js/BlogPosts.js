function BlogPostsManager() {
  this.showBlogPostsManager = function() {
    $('#core').fadeOut(function() {
      $('#core').empty();

      $.post("blogManager/blogPosts/controller/controller.php", function(data, status) {
        var blogManager = new BlogManager();

        $('#core').append(data);
        blogManager.modifyBackArrowTargetLink(blogManager.showBlogManager);
        $('#core').fadeIn();
        $('#backArrow').fadeIn();
      });
    });
  }
}
