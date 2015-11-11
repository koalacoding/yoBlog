$(function() {
  $.getScript("blog_manager/blog_options_manager/js/BlogOptionsManager.js", function() {
    var blogOptionsManager = new BlogOptionsManager();
    blogOptionsManager.confirmBlogOptionsManagerFormButtonHandler();
  });
});
