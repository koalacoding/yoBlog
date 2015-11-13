$(function() {
  var deletePost = new DeletePost();

  $(document).on('click', '.deletePostButton', function() {
    var postDate = $(this).parent().siblings('.deletePostPostDate').text();
    deletePost.deletePost(postDate);
    $(this).parent().parent().fadeOut(function() {
      $(this).remove();
    }); // Deletes the row from the view.
  });
});
