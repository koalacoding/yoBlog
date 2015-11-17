$(function() {
  var searchBar = new SearchBar;

  /*----------------------------------------
  ----------MAGNIFYING GLASS CLICK----------
  ----------------------------------------*/

  $(document).on('click', '#magnifyingGlass', function() {
    // Here we need setTimeout because we must wait for the Bootstrap's modal to appear.
    setTimeout(function() {
      $('#searchBarField').focus();
    }, 500);
  });

  /*--------------------------------------
  ----------AUTOCOMPLETE HANDLER----------
  --------------------------------------*/

  $(document).on("focus", '#searchBarField', function() {
    searchBar.handleAutoComplete();
  });
});
