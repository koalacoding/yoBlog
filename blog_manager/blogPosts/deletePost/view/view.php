<?php
function showView($posts) {
  echo '<div id="coreCore">
          <div id="actionResult">&nbsp;</div>
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>Date</th>
                  <th>Title</th>
                  <th>Content</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>'.$posts.'</tbody>
            </table>
          </div>
        </div>';
}
