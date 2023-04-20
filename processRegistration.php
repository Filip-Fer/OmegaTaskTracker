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
    echo $error;
  } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $error = "Neplatná emailová adresa.";
    echo $error;
  } elseif (emailExistsInDatabase($email, $conn)) {
    $error = "Tato emailová adresa již byla použita.";
    echo $error;
  } elseif (empty($username)) {
    $error = "Uživatelské jméno je povinné.";
    echo $error;
  } elseif (usernameExistsInDatabase($username, $conn)) {
    $error = "Toto uživatelské jméno je již zabrané.";
    echo $error;
  } elseif (empty($password)) {
    $error = "Heslo je povinné.";
    echo $error;
  } elseif (strlen($password) < 8) {
    $error = "Heslo musí být alespoň 8 znaků dlouhé.";
    echo $error;
  } else {
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $lowerEmail = strtolower($email);

    $stmt = $conn->prepare("INSERT INTO user (username, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $lowerEmail, $hashedPassword);
    
    if ($stmt->execute()) {
      header('Location: confirmationRegistration.php');
    } else {
      echo "Error: " . $stmt->error;
      header('Location: registration.php');
    }
  }
 


  $db->closeConnection();
  // Přesměrování na stránku s potvrzením registrace
  exit();
}
?>