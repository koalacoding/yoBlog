$(function() {
  $.getScript("blogManager/js/BlogManager.js", function() {
    var blogManager = new BlogManager();
  	blogManager.handleButtons();
  });
});
