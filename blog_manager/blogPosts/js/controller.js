$(function() {
  var newPost = new NewPost();

  $(document).on('click', 'button[name="newPost"]', function() {
    newPost.showView();
  });
});
