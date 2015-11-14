$(function() {
  var newPost = new NewPost();

  $(document).on('click', '#addNewForm', function() {
    newPost.addNewPost();
  });
});
