function ManageBlogPosts() {
  this.showManageBlogPosts = function() {
    $('#core').fadeOut(function() {
      $('#core').empty();

      $.post("manage_blog/manage_blog_posts/manage_blog_posts.php", function(data, status) {
        var manageBlogHandler = new ManageBlogHandler();

        $('#core').append(data);
        manageBlogHandler.modifyBackArrowTargetLink(manageBlogHandler.showManageBlog);
        $('#core').fadeIn();
        $('#back_arrow').fadeIn();
      });
    });
  }
}
