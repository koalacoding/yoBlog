function SearchBar() {
  this.handleAutoComplete = function() {
    if ( !$('#searchBarField').data("autocomplete") ) { // If the autocomplete wasn't called yet:
      $('#searchBarField').autocomplete({
        delay: 200,
        source: function(request, response) {
          if ($('#searchBarField').val().length > 2) {
            var result = [];

            $.post("startPage/searchBar/controller/controller.php",
              {string: $('#searchBarField').val()},
              function(data, status) {
                data = JSON.parse(data);

                for (var i = 0; i < data.length; i++) {
                  result.push(data[i]);
                }

                response(result);
              }
            );
          }
        },
        select: function( event, ui ) { // When we click on the specific result.
          var blogManager = new BlogManager();
          var startPage = new StartPage();
          var blogViewer = new BlogViewer();

          $('.btn-default').click();
          $('#magnifyingGlass').fadeOut();
          blogManager.modifyBackArrowTargetLink(startPage.showView);
          blogViewer.showView(ui.item.value);
        }
      });
    }
  }
}
