<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($conn, $_POST["name"]);
    $description = mysqli_real_escape_string($conn, $_POST["description"]);
    $tag_id = mysqli_real_escape_string($conn, $_POST["tag"]);
    $deadline = mysqli_real_escape_string($conn, $_POST["deadline"]);
    $user_id = $_SESSION['user_id'];
    $priority_id = mysqli_real_escape_string($conn, $_POST["priority"]);
    $is_complete = 0;
  
    $stmt = $conn->prepare("INSERT INTO task (name, description, tag_id, deadline, user_id, is_complete, priority_id) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssisiii", $name, $description, $tag_id, $deadline, $user_id, $is_complete, $priority_id);
    
    if ($stmt->execute()) {
        header('Location: tasks.php');
      } else {
        echo "Error: " . $stmt->error;
      }
    
    $stmt->close();
    $db->closeConnection();

}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = mysqli_real_escape_string($conn, $_POST["name"]);
  $description = mysqli_real_escape_string($conn, $_POST["description"]);
  $tag_id = mysqli_real_escape_string($conn, $_POST["tag"]);
  $deadline = mysqli_real_escape_string($conn, $_POST["deadline"]);
  $user_id = $_SESSION['user_id'];
  $priority_id = mysqli_real_escape_string($conn, $_POST["priority"]);
  $is_complete = 0;

  $stmt = $conn->prepare("INSERT INTO task (name, description, tag_id, deadline, user_id, is_complete, priority_id) VALUES (?, ?, ?, ?, ?, ?, ?)");
  $stmt->bind_param("ssisiii", $name, $description, $tag_id, $deadline, $user_id, $is_complete, $priority_id);
  
  if ($stmt->execute()) {
      header('Location: tasks.php');
    } else {
      echo "Error: " . $stmt->error;
    }
  
  $stmt->close();
  $db->closeConnection();

}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = mysqli_real_escape_string($conn, $_POST["name"]);
  $description = mysqli_real_escape_string($conn, $_POST["description"]);
  $tag_id = mysqli_real_escape_string($conn, $_POST["tag"]);
  $deadline = mysqli_real_escape_string($conn, $_POST["deadline"]);
  $user_id = $_SESSION['user_id'];
  $priority_id = mysqli_real_escape_string($conn, $_POST["priority"]);
  $is_complete = 0;

  $stmt = $conn->prepare("INSERT INTO task (name, description, tag_id, deadline, user_id, is_complete, priority_id) VALUES (?, ?, ?, ?, ?, ?, ?)");
  $stmt->bind_param("ssisiii", $name, $description, $tag_id, $deadline, $user_id, $is_complete, $priority_id);
  
  if ($stmt->execute()) {
      header('Location: tasks.php');
    } else {
      echo "Error: " . $stmt->error;
    }
  
  $stmt->close();
  $db->closeConnection();

}if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($conn, $_POST["name"]);
    $description = mysqli_real_escape_string($conn, $_POST["description"]);
    $tag_id = mysqli_real_escape_string($conn, $_POST["tag"]);
    $deadline = mysqli_real_escape_string($conn, $_POST["deadline"]);
    $user_id = $_SESSION['user_id'];
    $priority_id = mysqli_real_escape_string($conn, $_POST["priority"]);
    $is_complete = 0;
  
    $stmt = $conn->prepare("INSERT INTO task (name, description, tag_id, deadline, user_id, is_complete, priority_id) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssisiii", $name, $description, $tag_id, $deadline, $user_id, $is_complete, $priority_id);
    
    if ($stmt->execute()) {
        header('Location: tasks.php');
      } else {
        echo "Error: " . $stmt->error;
      }
    
    $stmt->close();
    $db->closeConnection();

}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = mysqli_real_escape_string($conn, $_POST["name"]);
  $description = mysqli_real_escape_string($conn, $_POST["description"]);
  $tag_id = mysqli_real_escape_string($conn, $_POST["tag"]);
  $deadline = mysqli_real_escape_string($conn, $_POST["deadline"]);
  $user_id = $_SESSION['user_id'];
  $priority_id = mysqli_real_escape_string($conn, $_POST["priority"]);
  $is_complete = 0;

  $stmt = $conn->prepare("INSERT INTO task (name, description, tag_id, deadline, user_id, is_complete, priority_id) VALUES (?, ?, ?, ?, ?, ?, ?)");
  $stmt->bind_param("ssisiii", $name, $description, $tag_id, $deadline, $user_id, $is_complete, $priority_id);
  
  if ($stmt->execute()) {
      header('Location: tasks.php');
    } else {
      echo "Error: " . $stmt->error;
    }
  
  $stmt->close();
  $db->closeConnection();

}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = mysqli_real_escape_string($conn, $_POST["name"]);
  $description = mysqli_real_escape_string($conn, $_POST["description"]);
  $tag_id = mysqli_real_escape_string($conn, $_POST["tag"]);
  $deadline = mysqli_real_escape_string($conn, $_POST["deadline"]);
  $user_id = $_SESSION['user_id'];
  $priority_id = mysqli_real_escape_string($conn, $_POST["priority"]);
  $is_complete = 0;

  $stmt = $conn->prepare("INSERT INTO task (name, description, tag_id, deadline, user_id, is_complete, priority_id) VALUES (?, ?, ?, ?, ?, ?, ?)");
  $stmt->bind_param("ssisiii", $name, $description, $tag_id, $deadline, $user_id, $is_complete, $priority_id);
  
  if ($stmt->execute()) {
      header('Location: tasks.php');
    } else {
      echo "Error: " . $stmt->error;
    }
  
  $stmt->close();
  $db->closeConnection();

}
?>