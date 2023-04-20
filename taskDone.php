<?php
  include "library.php";
  getDB();
  getCustomSQL();

  $db = new DatabaseConnection();
  $conn = $db->getConnection();

  if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = $_POST["id"];
    deleteTask($id, $conn);

    // návratová hodnota pro AJAX požadavek
    echo "success";
  } else {
    header("HTTP/1.1 405 Method Not Allowed");
    header("Allow: POST");
    echo "This endpoint accepts only POST requests";
  }
?>