function BlogOptionsManager() {
  /*---------------------------------------
  -----------------------------------------
  --------------SHOW CONTENT---------------
  -----------------------------------------
  ---------------------------------------*/

  this.showContent = function() {
    $('#core').fadeOut(function() {
      var requestType = 'showContent';

      $('#core').empty();

      $.post("blog_manager/blog_options_manager/php/BlogOptionsManagerHandler.php",
        {requestType: requestType},
        function(data, status) {
          var blogManager = new BlogManager();

          $('#core').append(data);
          $('#blog_options_colorpicker').spectrum({color: "#FFFFFF"});

          blogManager.modifyBackArrowTargetLink(blogManager.showBlogManager);

          $('#core').fadeIn();
          $('#back_arrow').fadeIn();
        }
      );
    });
  }

  /*---------------------------------------------------------------------------
  -----------------------------------------------------------------------------
  --------------CONFIRM BLOG OPTIONS MANAGER FORM BUTTON HANDLER---------------
  -----------------------------------------------------------------------------
  ---------------------------------------------------------------------------*/

  this.confirmBlogOptionsManagerFormButtonHandler = function() {
    $(document).on('click', '#confirmBlogOptionsManagerFormButton', function() {
      var requestType = 'updateBlogOptions';

      var title = $('[name="blog_title"]').val();
      var description = $('[name="blog_description"]').val();
      var titleAndDescriptionColor = $('.sp-preview-inner').css('background-color');
      var request = {title: title,
                     description: description,
                     titleAndDescriptionColor: titleAndDescriptionColor};

      $.post("blog_manager/blog_options_manager/php/BlogOptionsManagerHandler.php",
        {requestType: requestType, request: request},
        function(data, status) {
          if (data == 'ok') {
            $('#blogOptionsUpdateResult').hide(function() {
              $('#blogOptionsUpdateResult').text('Modifications were successful');
              $('#blogOptionsUpdateResult').fadeIn().delay(1000).fadeOut();
            });
          }

          else {
            $('#blogOptionsUpdateResult').hide(function() {
              $('#blogOptionsUpdateResult').css('color', '#FF0000');
              $('#blogOptionsUpdateResult').text('Error');
              $('#blogOptionsUpdateResult').fadeIn().delay(1000).fadeOut();
            });
          }
        }
      );
    });
  }
}
