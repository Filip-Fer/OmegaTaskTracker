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
$logged_user_email = getUserEmailById($logged_user, $conn);

echo $logged_user . ' ' . $logged_user_email;


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $share_task_id = mysqli_real_escape_string($conn, $_POST['id']);
    $share_to_email = mysqli_real_escape_string($conn, $_POST['email']);

    echo $share_task_id . ' ';
    echo $share_to_email . ' ';
    
    if (compare_strings($share_to_email, $logged_user_email) == false) {
        $share_to_user_id = getUserByEmail($share_to_email, $conn);
        $stmt = $conn->prepare("INSERT INTO shared_task (task_id, user_id) VALUES (?, ?)");
        $stmt->bind_param("ii", $share_task_id, $share_to_user_id);
        if ($stmt->execute()) {
            echo "Data byla úspěšně vložena.";
            header('Location: tasks.php');
        } else {
            echo "Chyba: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Nemůžete sdílet úkol sám sobě";
        header('Location: tasks.php');
    }
}
?>