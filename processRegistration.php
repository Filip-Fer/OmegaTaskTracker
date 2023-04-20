<?php
include 'library.php';
getDB();
getCustomSQL();

$db = new DatabaseConnection();
$conn = $db->getConnection();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Získání dat z formuláře
  $email = $_POST["email"];
  $username = $_POST["username"];
  $password = $_POST["password"];

  if (empty($email)) {
    $error = "Emailová adresa je povinná.";
  } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $error = "Neplatná emailová adresa.";
  } elseif (emailExistsInDatabase($email, $conn)) {
    $error = "Tato emailová adresa již byla použita.";
  } elseif (empty($username)) {
    $error = "Uživatelské jméno je povinné.";
  } elseif (usernameExistsInDatabase($username, $conn)) {
    $error = "Toto uživatelské jméno je již zabrané.";
  } elseif (empty($password)) {
    $error = "Heslo je povinné.";
  } elseif (strlen($password) < 8) {
    $error = "Heslo musí být alespoň 8 znaků dlouhé.";
  } else {
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $lowerEmail = strtolower($email);

    $stmt = $conn->prepare("INSERT INTO user (username, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $lowerEmail, $hashedPassword);
    
    if ($stmt->execute()) {
      header('Location: registrationConfirmation.php');
    } else {
      echo "Error: " . $stmt->error;
    }
  }
 


  $conn->closeConnection();
  // Přesměrování na stránku s potvrzením registrace
  header("Location: registrationConfirmation.php");
  exit();
}
?>