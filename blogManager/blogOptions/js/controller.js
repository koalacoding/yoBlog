$(function() {
  $.getScript("blogManager/blogOptions/js/BlogOptions.js", function() {
    var blogOptions = new BlogOptions();
    blogOptions.confirmFormButtonHandler();
  });
});
