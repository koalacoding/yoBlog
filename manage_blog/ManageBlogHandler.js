function ManageBlogHandler() {
  that = this;

  /*-------------------------------
  ---------------------------------
  --------------SHOW---------------
  ---------------------------------
  -------------------------------*/


    /*---------------------------
    ----------SHOW MAIN----------
    ---------------------------*/

    this.showMain = function() {
      $('#core').fadeOut(function() {
        $('#core').empty();

        $.post("manage_blog/manage_blog.php",
               function(data, status) {
                 $('#core').append(data);
                 $('#core').fadeIn();
                 that.modifyBackArrowTargetLink(that.showMain);
                 $('#back_arrow').fadeIn();
               }
        );
      });
    }

    /*----------------------------------------
    ----------SHOW MANAGE BLOG POSTS----------
    ----------------------------------------*/

    this.handleManageBlogPostsButtonClick = function() {
      $(document).on('click', '#manage_blog_articles_button', function() {
        $('#core').fadeOut(function() {
          $('#core').empty();

          $.post("manage_blog/manage_blog_articles/manage_blog_articles.php",
                 function(data, status) {
                   $('#core').append(data);
                   $('#core').fadeIn();
                 }
          );
        });
      });
    }


  /*--------------------------------------------------------
  ----------------------------------------------------------
  --------------MODIFY BACK ARROW TARGET LINK---------------
  ----------------------------------------------------------
  --------------------------------------------------------*/

  this.modifyBackArrowTargetLink = function(myfunction) {
    $(document).on('click', '#back_arrow', function() {
      myfunction();
    });
  }
}

$(function() {
  var manageBlogHandler = new ManageBlogHandler();
	manageBlogHandler.handleManageBlogPostsButtonClick();
});
