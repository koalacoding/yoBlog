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

      $.post("blog_manager/blogOptions/controller/controller.php",
        {requestType: requestType},
        function(data, status) {
          var blogManager = new BlogManager();

          $('#core').append(data);
          $('#colorpicker').spectrum({color: "#FFFFFF"});

          blogManager.modifyBackArrowTargetLink(blogManager.showBlogManager);

          $('#core').fadeIn();
          $('#back_arrow').fadeIn();
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

      $.post("blog_manager/blogOptions/controller/controller.php",
        {requestType: requestType, request: request},
        function(data, status) {
          if (data == 'ok') {
            $('#blogOptionsUpdateResult').hide(function() {
              $('#blogOptionsUpdateResult').css('color', '#00AA00');              
              $('#blogOptionsUpdateResult').text('Modifications were successful');
              $('#blogOptionsUpdateResult').fadeIn().delay(1000).fadeOut();
            });
          }

          else {
            $('#blogOptionsUpdateResult').hide(function() {
              $('#blogOptionsUpdateResult').css('color', '#AA0000');
              $('#blogOptionsUpdateResult').text('Error');
              $('#blogOptionsUpdateResult').fadeIn().delay(1000).fadeOut();
            });
          }
        }
      );
    });
  }
}
