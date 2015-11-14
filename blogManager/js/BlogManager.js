function BlogManager() {
  that = this;

  /*-------------------------------
  ---------------------------------
  --------------SHOW---------------
  ---------------------------------
  -------------------------------*/


    /*---------------------------
    ----------SHOW VIEW----------
    ---------------------------*/

    this.showView = function() {
      $('#core').fadeOut(function() {
        $('#core').empty();

        $.post("blogManager/controller/controller.php", function(data, status) {
           var startPage = new StartPage();

           $('#core').append(data);
           that.modifyBackArrowTargetLink(startPage.showView);
           $('#core').fadeIn();
           $('#backArrow').fadeIn();
        });
      });
    }


  /*------------------------------------------
  --------------------------------------------
  --------------BUTTONS HANDLER---------------
  --------------------------------------------
  ------------------------------------------*/

  this.handleButtons = function() {
    this.viewBlogButtonHandler();
    this.handleManageBlogPostsButtonHandler();
    this.manageBlogOptionsButtonHandler();
  }


    /*------------------------------------------
    ----------VIEW BLOG BUTTON HANDLER----------
    ------------------------------------------*/

    this.viewBlogButtonHandler = function() {
      $(document).on('click', '#viewBlogButton', function() {
        var blogViewer = new BlogViewer();
        blogViewer.showView();
      });
    }

    /*---------------------------------------------------
    ----------MANAGER BLOG POSTS BUTTON HANDLER----------
    ---------------------------------------------------*/

    this.handleManageBlogPostsButtonHandler = function() {
      $(document).on('click', '#manageBlogPostsButton', function() {
        var blogPostsManager = new BlogPostsManager();
        blogPostsManager.showBlogPostsManager();
      });
    }

    /*------------------------------------------
    ----------VIEW BLOG BUTTON HANDLER----------
    ------------------------------------------*/

    this.manageBlogOptionsButtonHandler = function() {
      $(document).on('click', '#manageBlogOptionsButton', function() {
          var blogOptions = new BlogOptions();
          blogOptions.showView();
      });
    }


  /*--------------------------------------------------------
  ----------------------------------------------------------
  --------------MODIFY BACK ARROW TARGET LINK---------------
  ----------------------------------------------------------
  --------------------------------------------------------*/

  this.modifyBackArrowTargetLink = function(myfunction) {
    $('#backArrow').unbind('click');
    $('#backArrow').click(function() {
      myfunction();
    });
  }
}
