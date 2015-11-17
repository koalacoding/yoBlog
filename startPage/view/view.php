<?php
function showView($buttons) {
  echo '<div id="coreCore">
          <h1>yoBlog</h1>
          <h2>An easy way to make your own blog.</h2>

          <div id="buttons">'.$buttons.'</div>
        </div>

        <div id="myModal" class="modal fade" role="dialog">
          <div class="modal-dialog">

            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Find a blog</h4>
              </div>
              <div class="modal-body">
                <p>Enter a blog\'s name or a part of the name to find it :</p>
                <input id="searchBarField" type="text">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>

          </div>
        </div>';
}
