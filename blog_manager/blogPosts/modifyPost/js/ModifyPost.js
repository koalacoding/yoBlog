function ModifyPost() {
  /*------------------------------------
  --------------------------------------
  --------------SHOW VIEW---------------
  --------------------------------------
  ------------------------------------*/

  this.showView = function() {
    $('#core').fadeOut(function() {
      var requestType = 'showView';

      $('#core').empty();

      $.post("blog_manager/blogPosts/modifyPost/controller/controller.php",
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

  /*--------------------------------------
  ----------------------------------------
  --------------MODIFY POST---------------
  ----------------------------------------
  --------------------------------------*/

  this.modifyPost = function(postDate) {
    var requestType = 'modifyPost';

    var title = $('input[name="title"]').val();
    var content = $('textarea[name="content"]').val();
    var request = {postDate: postDate, title: title, content: content};

    $.post("blog_manager/blogPosts/modifyPost/controller/controller.php",
      {requestType: requestType, request: request},
      function(data, status) {
        actionResult(data, 'ok');
      }
    );
  }
}
