function DeletePost() {
  /*------------------------------------
  --------------------------------------
  --------------SHOW VIEW---------------
  --------------------------------------
  ------------------------------------*/

  this.showView = function() {
    $('#core').fadeOut(function() {
      var requestType = 'showView';

      $('#core').empty();

      $.post("blogManager/blogPosts/deletePost/controller/controller.php",
        {requestType: requestType},
        function(data, status) {
          var blogManager = new BlogManager();
          var blogPostsManager = new BlogPostsManager();

          $('#core').append(data);

          blogManager.modifyBackArrowTargetLink(blogPostsManager.showBlogPostsManager);

          $('#core').fadeIn();
          $('#backArrow').fadeIn();
        }
      );
    });
  }

  /*--------------------------------------
  ----------------------------------------
  --------------DELETE POST---------------
  ----------------------------------------
  --------------------------------------*/

  this.deletePost = function(postDate) {
    var requestType = 'deletePost';

    var request = {postDate: postDate};

    $.post("blogManager/blogPosts/deletePost/controller/controller.php",
      {requestType: requestType, request: request},
      function(data, status) {
        actionResult(data, 'ok');
      }
    );
  }
}
