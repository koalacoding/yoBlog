$(function() {
  var newPost = new NewPost();
  var deletePost = new DeletePost();

  $(document).on('click', 'button[name="newPost"]', function() {
    newPost.showView();
  });

  $(document).on('click', 'button[name="deletePost"]', function() {
    deletePost.showView();
  });
});
