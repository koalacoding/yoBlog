$(function() {
  $.getScript("blog_manager/js/BlogManager.js", function() {
    var blogManager = new BlogManager();
  	blogManager.handleButtons();
  });
});
