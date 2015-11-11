$(function() {
  $.getScript("blog_manager/blogOptions/js/BlogOptions.js", function() {
    var blogOptions = new BlogOptions();
    blogOptions.confirmFormButtonHandler();
  });
});
