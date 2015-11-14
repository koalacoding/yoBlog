function StartPage() {
  /* Used to prevent the user to show both the register and login forms
    by clicking too fast on both of the buttons. */
  var allowClick = true;

  this.showView = function() {
    var requestType = 'showView';

    $.post("startPage/controller/controller.php", {requestType: requestType},
      function(data, status) {
       $('#backArrow').fadeOut();
       $('#core').fadeOut(function() {
         $('#core').empty();
         $('#core').append(data);
         $('#core').fadeIn();
       });
      }
    );
  }


  /*--------------------------------------
  ----------------------------------------
  --------------SHOW BUTTONS--------------
  ----------------------------------------
  --------------------------------------*/


    /*----------------------------------------
    ----------SHOW CONNECTED BUTTONS----------
    ----------------------------------------*/

    this.showConnectedButtons = function() {
      var requestType = 'getConnectedButtons';

      $('#buttons').fadeOut();
      $('.form').fadeOut(function() {
        $('.form').remove();

        $.post("startPage/controller/controller.php", {requestType: requestType},
          function(data) {
            $('#buttons').empty();
            $('#buttons').append(data);
            $('#buttons').fadeIn();
          }
        );
      });
    }

    /*-----------------------------------------
    ----------SHOW NOT CONNECTED BUTTONS-------
    -----------------------------------------*/

    this.showNotConnectedButtons = function() {
      var requestType = 'getNotConnectedButtons';

      $('#buttons').fadeOut(function() {
        $.post("startPage/controller/controller.php", {requestType: requestType},
          function(data) {
            $('#buttons').empty();
            $('#buttons').append(data);
            $('#buttons').fadeIn();
          }
        );
      });
    }


  /*------------------------------------
  --------------------------------------
  --------------SHOW FORM---------------
  --------------------------------------
  ------------------------------------*/

  this.showForm = function(form) {
    function action() {
      $.post("startPage/controller/controller.php", {requestType: requestType},
        function(data) {
          $('.form').remove(); // If there was already a form.
          $('#buttons').after(data);
          $('.form').fadeIn(function() {
            $('input[name="username"]').focus();
          });
        }
      );
    }

    var requestType = 'get'+form+'Form';

    if ($('.form').length) { // If there is already a form.
      $('.form').fadeOut(function() {
        action();
      });
    }

    else action();
  }


    /*-----------------------------------------------------
    -------------------------------------------------------
    --------------CONNECTED BUTTONS HANDLERS---------------
    -------------------------------------------------------
    -----------------------------------------------------*/

    this.connectedButtonsHandler = function() {
      this.manageBlogButtonHandler();
      this.logoutButtonHandler();
    }


      /*--------------------------------------------
      ----------MANAGE BLOG BUTTON HANDLER----------
      --------------------------------------------*/

      this.manageBlogButtonHandler = function() {
        var blogManager = new BlogManager();

        $(document).on('click', '#manage_your_blog_button', function() {
          blogManager.showBlogManager();
        });
      }

      /*---------------------------------------
      ----------LOGOUT BUTTON HANDLER----------
      ---------------------------------------*/

      this.logoutButtonHandler = function() {
        var logoutHandler = new LogoutHandler;

        $(document).on('click', '#logout_button', function() {
          logoutHandler.logoutOnLogoutButtonClick();
        });
      }

}
