function ManageBlogHandler() {

this.initialize = function() {
  this.showManageBlogPosts();
}

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
               $('#white_arrow').fadeIn();
             }
      );
    });
  }

  /*----------------------------------------
  ----------SHOW MANAGE BLOG POSTS----------
  ----------------------------------------*/

  this.showManageBlogPosts = function() {
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

}

$(function() {
  var manageBlogHandler = new ManageBlogHandler();
	manageBlogHandler.initialize();
});
