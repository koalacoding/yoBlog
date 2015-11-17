function BlogViewer() {
  that = this;

  this.actionInProgress = false;

  /*---------------------------
  ----------SHOW VIEW----------
  ---------------------------*/

  this.showView = function(blogName) {
    if (that.actionInProgress == false) {
      that.actionInProgress = true;

      $('#core').fadeOut(function() {
        var requestType = 'showView';
        $('#core').empty();

        $.post("blogManager/blogViewer/controller/controller.php",
          {requestType: requestType, blogName: blogName},
          function(data, status) {
            var blogManager = new BlogManager();

            $('#core').append(data);

            requestType = 'getHeaderCss';
            $.post("blogManager/blogViewer/controller/controller.php",
              {requestType: requestType, blogName: blogName},
              function(data, status) {
                data = data.split(";");
                $('<img/>').attr('src', data[0]).load(function() {
                   $(this).remove(); // Prevent memory leak.
                   $('.jumbotron').css('background', 'url("'+data[0]+'")');
                   $('.jumbotron').css('color', data[1]);
                   $('.jumbotron').fadeTo(1500, 1);
                   that.actionInProgress = false;
                });
              }
            );

            $('#core').fadeIn();
            $('#backArrow').fadeIn();
          }
        );
      });
    }
  }

  /*-----------------------------------
  ----------CHANGE POSTS PAGE----------
  -----------------------------------*/

  this.changePostsPage = function(postOffsetModifier) {
    var requestType = 'getPosts';
    var postOffset = $('#posts').data('post-offset');
    var request = {};
    var blogName = $('.jumbotron').data('blog-name');
    var newPageIsEmpty = false;

    postOffset = parseInt(postOffset) + postOffsetModifier;
    request = {"postOffset": postOffset};

    // A first request to check if there is any post to show on the new page.
    $.post('blogManager/blogViewer/controller/controller.php',
      {requestType: requestType, request: request, blogName: blogName},
      function (data) {
        if (data != '') { // If the new page has any post to show.
          $('#posts').fadeOut(function() {
            $('#posts').empty();
            $('#posts').data('post-offset', postOffset);

            $.post('blogManager/blogViewer/controller/controller.php',
              {requestType: requestType, request: request, blogName: blogName},
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
