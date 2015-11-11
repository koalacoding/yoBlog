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

        $.post("blog_manager/blog_manager.php", function(data, status) {
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
    this.handleManageBlogPostsButtonHandler();
    this.viewBlogButtonHandler();
  }

    /*---------------------------------------------------
    ----------MANAGER BLOG POSTS BUTTON HANDLER----------
    ---------------------------------------------------*/

    this.handleManageBlogPostsButtonHandler = function() {
      $(document).on('click', '#manage_blog_posts_button', function() {
        $.getScript("blog_manager/blog_posts_manager/BlogPostsManager.js", function() {
          var blogPostsManager = new BlogPostsManager();
          blogPostsManager.showBlogPostsManager();
        });
      });
    }

    /*------------------------------------------
    ----------VIEW BLOG BUTTON HANDLER----------
    ------------------------------------------*/

    this.viewBlogButtonHandler = function() {
      $(document).on('click', '#view_blog_button', function() {
        $.getScript("blog_manager/blog_viewer/BlogViewer.js", function() {
          var blogViewer = new BlogViewer();
          blogViewer.showBlog();
        });
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
