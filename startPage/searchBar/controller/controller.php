<?php
require '../model/SearchBar.php';

if (isset($_POST['string'])) {
  $searchBar = new SearchBar;
  $results = $searchBar->searchBlog($_POST['string']);
  echo json_encode($results);
}
