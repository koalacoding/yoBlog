<?php
function showView() {
  echo '<div id="coreCore">
          <span>Title :</span>
          <br />
          <input type="text" class="form_field" name="title">
          <br />
          <br />
          <span>Content :</span>
          <br />
          <textarea name="content" rows="8" cols="28"></textarea>
          <br />
          <br />
          <br />
          <button id="addNewForm">OK</button>
          <br />
          <br />
          <span id="actionResult"></span>
        </div>';
}
