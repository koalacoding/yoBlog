function BlogViewer() {
  /*---------------------------
  ----------SHOW VIEW----------
  ---------------------------*/

  this.showView = function() {
    $('#core').fadeOut(function() {
      var requestType = 'showView';
      $('#core').empty();

      $.post("blogManager/blogViewer/controller/controller.php", {requestType: requestType},
        function(data, status) {
          var blogManager = new BlogManager();

          $('#core').append(data);

          requestType = 'getHeaderCss';
          $.post("blogManager/blogViewer/controller/controller.php", {requestType: requestType},
            function(data, status) {
              data = data.split(";");
              $('.jumbotron').css('background', 'url("'+data[0]+'")');
              $('.jumbotron').css('color', data[1]);
            }
          );

          blogManager.modifyBackArrowTargetLink(blogManager.showView);

          $('#core').fadeIn();
          $('#backArrow').fadeIn();
        }
      );
    });
  }

  /*-----------------------------------
  ----------CHANGE POSTS PAGE----------
  -----------------------------------*/

  this.changePostsPage = function(postOffsetModifier) {
    var requestType = 'getPosts';
    var postOffset = $('#posts').data('post-offset');
    var request = {};
    var newPageIsEmpty = false;

    postOffset = parseInt(postOffset) + postOffsetModifier;
    request = {"postOffset": postOffset};

    // A first request to check if there is any post to show on the new page.
    $.post('blogManager/blogViewer/controller/controller.php',
      {requestType: requestType, request: request},
      function (data) {
        if (data != '') { // If the new page has any post to show.
          $('#posts').fadeOut(function() {
            $('#posts').empty();
            $('#posts').data('post-offset', postOffset);

            $.post('blogManager/blogViewer/controller/controller.php',
              {requestType: requestType, request: request},
              function (data) {
                $('#posts').append(data);
                $('#posts').fadeIn();
              }
            );
          });
        }
      }
    );
  }
}
