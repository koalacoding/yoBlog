function ModifyPost() {
  var that = this;

  /*------------------------------------
  --------------------------------------
  --------------SHOW VIEW---------------
  --------------------------------------
  ------------------------------------*/

  this.showView = function(callback) {
    $('#core').fadeOut(function() {
      var requestType = 'showView';

      $('#core').empty();
      $('.ui-dialog').remove();
      $('#dialog-confirm').remove();

      $.post("blogManager/blogPosts/modifyPost/controller/controller.php",
        {requestType: requestType},
        function(data, status) {
          var blogManager = new BlogManager();
          var blogPostsManager = new BlogPostsManager();

          $('#core').append(data);

          blogManager.modifyBackArrowTargetLink(blogPostsManager.showBlogPostsManager);

          $('#core').fadeIn();
          $('#backArrow').fadeIn();

          callback();
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

    $.post("blogManager/blogPosts/modifyPost/controller/controller.php",
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

    $.post("blogManager/blogPosts/modifyPost/controller/controller.php",
      {requestType: requestType, request: request},
      function(data, status) {
        that.showView(function() { actionResult(data, 'ok'); });
      }
    );
  }
}
