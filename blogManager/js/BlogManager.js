function BlogManager() {
  that = this;

  /*-------------------------------
  ---------------------------------
  --------------SHOW---------------
  ---------------------------------
  -------------------------------*/


    /*----------------------------------
    ----------SHOW MANAGE BLOG----------
    ----------------------------------*/

    this.showBlogManager = function() {
      $('#core').fadeOut(function() {
        $('#core').empty();

        $.post("blogManager/blogManager.php", function(data, status) {
           var startPage = new StartPage();
           var startPageButtonsHandler = new StartPageButtonsHandler();

           $('#core').append(data);
           that.modifyBackArrowTargetLink(startPage.showStartPage);
           $('#core').fadeIn();
           $('#back_arrow').fadeIn();
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
      $(document).on('click', '#view_blog_button', function() {
        var blogViewer = new BlogViewer();
        blogViewer.showView();
      });
    }

    /*---------------------------------------------------
    ----------MANAGER BLOG POSTS BUTTON HANDLER----------
    ---------------------------------------------------*/

    this.handleManageBlogPostsButtonHandler = function() {
      $(document).on('click', '#manage_blog_posts_button', function() {
        var blogPostsManager = new BlogPostsManager();
        blogPostsManager.showBlogPostsManager();
      });
    }

    /*------------------------------------------
    ----------VIEW BLOG BUTTON HANDLER----------
    ------------------------------------------*/

    this.manageBlogOptionsButtonHandler = function() {
      $(document).on('click', '#manage_blog_options_button', function() {
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
    $('#back_arrow').unbind('click');
    $('#back_arrow').click(function() {
      myfunction();
    });
  }
}
