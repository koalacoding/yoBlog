$(function() {
  var deletePost = new DeletePost();

  $(document).on('click', '.deletePostButton', function() {
    var clickedButton = $(this);

    $( "#dialog-confirm" ).attr('title', 'Delete post');
		$( ".ui-dialog-title" ).text('Delete post');
    $( "#dialog-confirm p" ).text('Are you sure you want to delete this post ?');
		$( "#dialog-confirm" ).dialog({
			resizable: false,
			height: 150,
			modal: true,
			buttons: {
				Yes: function() {
          var postDate = clickedButton.parent().siblings('.deletePostPostDate').text();
          deletePost.deletePost(postDate);

          // Deletes the row from the view.
          clickedButton.parent().parent().fadeOut(function() {
            clickedButton.remove();
          });

					$( this ).dialog( "close" );
				},
				No: function() {
					$( this ).dialog( "close" );
				}
			}
		});
  });
});
