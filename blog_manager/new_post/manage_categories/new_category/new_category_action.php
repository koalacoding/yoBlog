<?php
  include_once('../../../../to_include.php');

  if (isset($_SESSION['username']) && isset($_POST['category'])) {
    include_once ('../../../../sql_connexion.php');
    include_once('new_category_action_functions.php');

    add_new_category($bdd, $_SESSION['username'], $_POST['category']);

    header("refresh:0;url=../manage_categories.php");
  }

  else { // If the user is not connected to an account.
    echo 'You must be connected to access to this page. Redirection in 2 seconds...';
    header("refresh:2;url=../../../../login.php");
  }

?>
