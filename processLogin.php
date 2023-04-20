<?php
require 'library.php';
getDB();

$db = new DatabaseConnection();
$conn = $db->getConnection();



if ($_SERVER["REQUEST_METHOD"] == "POST") {
  

  $email = $_POST["email"];
  $password = $_POST["password"];
  $hashed_password = password_hash($password, PASSWORD_DEFAULT);


  $sql = "SELECT id, password FROM user WHERE email = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $result = $stmt->get_result();


  $hash = password_hash($password, PASSWORD_DEFAULT);

  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $db_password = $row['password'];
    if (password_verify($password, $db_password)) {
      session_start();
      $_SESSION['user_id'] = $row['id'];
      header('Location: ./tasks.php');
      exit();
    } else {

    $error = 'Přihlášení selhalo. Zkontrolujte přihlašovací údaje.';
    echo $error;
    header('Location: ./login.php');
    }
  }
}
?>
