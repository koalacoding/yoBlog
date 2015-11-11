<?php
  include_once('../../../../to_include.php');

  if (isset($_SESSION['username'])) {
    include_once ('../../../../sql_connexion.php');
    include_once('delete_category_action_functions.php');

    // Checking if the user can delete the category given in GET parameter.
    $has_user_access_on_category = check_if_user_has_access_on_category($bdd, $_SESSION['username'],
                                                                        $_GET['category_name']);
    if ($has_user_access_on_category == TRUE) {
      delete_category($bdd, $_SESSION['username'], $_GET['category_name']);
      header("refresh:0;url=../manage_categories.php");
    }

    else {
      echo 'You cannot delete this category. Redirection in 2 seconds...';
      header("refresh:0;url=../manage_categories.php");
    }
  }

  else { // If the user is not connected to an account.
    echo 'You must be connected to access to this page. Redirection in 2 seconds...';
    header("refresh:2;url=../../../../login.php");
  }

?>
