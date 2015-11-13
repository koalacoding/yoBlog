$(function() {
  var newPost = new NewPost();
  var modifyPost = new ModifyPost();
  var deletePost = new DeletePost();

  $(document).on('click', 'button[name="newPost"]', function() {
    newPost.showView();
  });

  $(document).on('click', 'button[name="modifyPost"]', function() {
    modifyPost.showView(function() {});
  });

  $(document).on('click', 'button[name="deletePost"]', function() {
    deletePost.showView();
  });
});
