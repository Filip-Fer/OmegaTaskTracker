<?php
session_start();

if (isset($_SESSION['user_id'])) {

} else {
  header("Location: index.php");
  exit;
}

include 'library.php';
getDB();
getCustomSQL();
getCompareStrings();


$db = new DatabaseConnection();
$conn = $db->getConnection();

$logged_user = $_SESSION['user_id'];
$user_email = getUserEmailById($logged_user, $conn);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $task_id = $_POST['id'];
    $email = $_POST['email'];
}

if (compare_strings($email, $user_email)) {
    $user_id = getUserByEmail($email, $conn);
    $sql = "INSERT INTO shared_task (task_id, user_id) VALUES ('$task_id', '$user_id')";

    if ($conn->query($sql) === TRUE) {
        echo "Data byla úspěšně vložena.";
        header('Location: tasks.php');
    } else {
        echo "Chyba: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Nemůžete sdílet úkol sám sobě";
    header('Location: tasks.php');
}

?>
