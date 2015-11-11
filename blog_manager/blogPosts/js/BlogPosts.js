function BlogPostsManager() {
  this.showBlogPostsManager = function() {
    $('#core').fadeOut(function() {
      $('#core').empty();

      $.post("blog_manager/blogPosts/controller/controller.php", function(data, status) {
        var blogManager = new BlogManager();

        $('#core').append(data);
        blogManager.modifyBackArrowTargetLink(blogManager.showBlogManager);
        $('#core').fadeIn();
        $('#back_arrow').fadeIn();
      });
    });
  }
}
