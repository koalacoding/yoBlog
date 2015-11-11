<?php
function showView() {
  echo '<div id="blog_options_manager_form">
          <span>Header background image link :</span>
          <br />
          <input type="text" class="form_field" name="headerBackgroundImage">
          <br />
          <br />
          <div style="margin-bottom: -10px;">Header text color :</div>
          <br />
          <input id="colorpicker">
          <br />
          <br />
          <span>Blog title :</span>
          <br />
          <input type="text" class="form_field" name="blog_title">
          <br />
          <br />
          <span>Blog description :</span>
          <br />
          <input type="text" class="form_field" name="blog_description">
          <br />
          <br />
          <br />
          <button id="confirmForm">OK</button>
          <br />
          <br />
          <span id="blogOptionsUpdateResult"></span>
        </div>';
}
