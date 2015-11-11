function BlogPostsManager() {
  this.showBlogPostsManager = function() {
    $('#core').fadeOut(function() {
      $('#core').empty();

      $.post("blog_manager/blog_posts_manager/blog_posts_manager.php", function(data, status) {
        var blogManager = new BlogManager();

        $('#core').append(data);
        blogManager.modifyBackArrowTargetLink(blogManager.showBlogManager);
        $('#core').fadeIn();
        $('#back_arrow').fadeIn();
      });
    });
  }
}
