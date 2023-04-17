<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // získání hodnoty zaslané formulářem
  $item = $_POST["item"];

  // smazání položky z databáze nebo jiného uložiště dat

  // návratová hodnota pro AJAX požadavek
  echo "success";
} else {
  header("HTTP/1.1 405 Method Not Allowed");
  header("Allow: POST");
  echo "This endpoint accepts only POST requests";
}
?>