function NewPost() {
  /*------------------------------------
  --------------------------------------
  --------------SHOW VIEW---------------
  --------------------------------------
  ------------------------------------*/

  this.showView = function() {
    $('#core').fadeOut(function() {
      var requestType = 'showView';

      $('#core').empty();

      $.post("blogManager/blogPosts/newPost/controller/controller.php",
        {requestType: requestType},
        function(data, status) {
          var blogManager = new BlogManager();
          var blogPostsManager = new BlogPostsManager();

          $('#core').append(data);

          blogManager.modifyBackArrowTargetLink(blogPostsManager.showBlogPostsManager);

          $('#core').fadeIn();
          $('#back_arrow').fadeIn();
        }
      );
    });
  }

  /*---------------------------------------
  -----------------------------------------
  --------------ADD NEW POST---------------
  -----------------------------------------
  ---------------------------------------*/

  this.addNewPost = function() {
    var requestType = 'addNewPost';

    var title = $('input[name="title"]').val();
    var content = $('textarea[name="content"]').val();
    var request = {title: title, content: content};

    $.post("blogManager/blogPosts/newPost/controller/controller.php",
      {requestType: requestType, request: request},
      function(data, status) {
        actionResult(data, 'ok');
      }
    );
  }
}
