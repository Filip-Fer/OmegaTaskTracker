<?php
session_start();

if (isset($_SESSION['user_id'])) {
} else {
  header("Location: index.php");
  exit;
}

include 'library.php';
getFormatDate();
getDB();
getCustomSQL();

$db = new DatabaseConnection();
$conn = $db->getConnection();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = mysqli_real_escape_string($conn, $_POST["id"]);
    $name = mysqli_real_escape_string($conn, $_POST["name"]);
    $description = mysqli_real_escape_string($conn, $_POST["description"]);
    $tag_id = mysqli_real_escape_string($conn, $_POST["tag"]);
    $deadline = mysqli_real_escape_string($conn, $_POST["deadline"]);
    $priority_id = mysqli_real_escape_string($conn, $_POST["priority"]);
  
    $stmt = $conn->prepare("UPDATE task SET name = ?, description = ?, tag_id = ?, deadline = ?, priority_id = ? WHERE id = ?");
    $stmt->bind_param("ssisii", $name, $description, $tag_id, $deadline, $priority_id, $id);

    if ($stmt->execute()) {
        header('Location: tasks.php');
      } else {
        echo "Error: " . $stmt->error;
      }
    
    $stmt->close();
    $db->closeConnection();

}
?>