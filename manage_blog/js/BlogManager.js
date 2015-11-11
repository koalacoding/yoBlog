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

        $.post("manage_blog/manage_blog.php", function(data, status) {
           var startPage = new StartPage();
           var startPageButtonsHandler = new StartPageButtonsHandler();

           $('#core').append(data);
           that.modifyBackArrowTargetLink(startPage.showStartPage);
           $('#core').fadeIn();
           $('#back_arrow').fadeIn();
        });
      });
    }

    /*----------------------------------------
    ----------SHOW MANAGE BLOG POSTS----------
    ----------------------------------------*/

    this.handleManageBlogPostsButtonClick = function() {
      $(document).on('click', '#manage_blog_articles_button', function() {
        $.getScript("manage_blog/manage_blog_posts/ManageBlogPosts.js", function() {
          var manageBlogPosts = new ManageBlogPosts();
          manageBlogPosts.showManageBlogPosts();
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
