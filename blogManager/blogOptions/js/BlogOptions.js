function BlogOptions() {
  /*---------------------------------------
  -----------------------------------------
  --------------SHOW CONTENT---------------
  -----------------------------------------
  ---------------------------------------*/

  this.showView = function() {
    $('#core').fadeOut(function() {
      var requestType = 'showView';

      $('#core').empty();

      $.post("blogManager/blogOptions/controller/controller.php",
        {requestType: requestType},
        function(data, status) {
          var headerTextColor = '';

          var blogManager = new BlogManager();

          headerTextColor = $('#headerTextColor').data('color');

          $('#core').append(data);

          $('#colorpicker').spectrum({color: "#FFFFFF"});

          blogManager.modifyBackArrowTargetLink(blogManager.showBlogManager);

          $('#core').fadeIn();
          $('#backArrow').fadeIn();
        }
      );
    });
  }

  /*------------------------------------------------------
  --------------------------------------------------------
  --------------CONFIRM FORM BUTTON HANDLER---------------
  --------------------------------------------------------
  ------------------------------------------------------*/

  this.confirmFormButtonHandler = function() {
    $(document).on('click', '#confirmForm', function() {
      var requestType = 'updateBlogOptions';

      var headerBackgroundImage = $('[name="headerBackgroundImage"]').val();
      var headerTextColor = $('.sp-preview-inner').css('background-color');
      var title = $('[name="blog_title"]').val();
      var description = $('[name="blog_description"]').val();

      var request = {headerBackgroundImage: headerBackgroundImage,
                     headerTextColor: headerTextColor,
                     title: title,
                     description: description};

      $.post("blogManager/blogOptions/controller/controller.php",
        {requestType: requestType, request: request},
        function(data, status) {
          actionResult(data, 'ok');
        }
      );
    });
  }
}
