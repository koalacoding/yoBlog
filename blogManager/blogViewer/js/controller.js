$(function() {
  var blogViewer = new BlogViewer();

  $(document).on('click', '#olderPostsArrow', function() {
    blogViewer.changePostsPage(5);
  });

  $(document).on('click', '#newerPostsArrow', function() {
    blogViewer.changePostsPage(-5);
  });
});
