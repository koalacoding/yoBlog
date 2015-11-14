$(function() {
  var modifyPost = new ModifyPost();

  $(document).on('click', '.modifyPostButton', function() {
    var postDate = $(this).parent().siblings('.deletePostPostDate').text();

    $( "#dialog-confirm" ).attr('title', 'Modify post');
		$( ".ui-dialog-title" ).text('Modify post');
    modifyPost.getPostTitleAndContent(postDate);
		$( "#dialog-confirm" ).dialog({
			resizable: false,
			height: 300,
      width: 320,
			modal: true,
			buttons: {
				Update: function() {
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
