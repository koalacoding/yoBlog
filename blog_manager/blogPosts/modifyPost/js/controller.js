$(function() {
  var modifyPost = new ModifyPost();

  $(document).on('click', '.modifyPostButton', function() {
    var clickedButton = $(this);

    $( "#dialog-confirm" ).attr('title', 'Modify post');
		$( ".ui-dialog-title" ).text('Modify post');
    $( "#dialog-confirm div" ).html('<span>Title :</span>\
                                      <br />\
                                      <input type="text" class="form_field" name="title">\
                                      <br />\
                                      <br />\
                                      <span>Content :</span>\
                                      <br />\
                                      <textarea name="content" rows="8" cols="28"></textarea>');
		$( "#dialog-confirm" ).dialog({
			resizable: false,
			height: 300,
      width: 320,
			modal: true,
			buttons: {
				Update: function() {
          var postDate = clickedButton.parent().siblings('.deletePostPostDate').text();
          modifyPost.modifyPost(postDate);
					$( this ).dialog( "close" );
				},
				Cancel: function() {
					$( this ).dialog( "close" );
				}
			}
		});
  });
});
