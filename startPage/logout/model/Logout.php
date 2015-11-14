<?php
class Logout {
  function logoutAction() {
    session_unset();
  	session_destroy();
  }
}
