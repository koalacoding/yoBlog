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

  /*-----------------------------------------------------
  -------------------------------------------------------
  --------------GET POST TITLE AND CONTENT---------------
  -------------------------------------------------------
  -----------------------------------------------------*/

  this.getPostTitleAndContent = function(postDate) {
    var requestType = 'getPostTitleAndContent';

    var request = {postDate: postDate};

    var jsonObject = {};

    $.post("blog_manager/blogPosts/modifyPost/controller/controller.php",
      {requestType: requestType, request: request},
      function(data, status) {
        data = JSON.parse(data);
        $( "#dialog-confirm div" ).html('<span>Title :</span>\
                                          <br />\
                                          <input type="text" class="form_field" name="title">\
                                          <br />\
                                          <br />\
                                          <span>Content :</span>\
                                          <br />\
                                          <textarea name="content" rows="8" cols="28"></textarea>');
        $('input[name="title"]').val(data['title']);
        $('textarea').val(data['content']);
      }
    );
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
