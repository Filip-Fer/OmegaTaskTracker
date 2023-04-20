<?php

include "../database/dbcon.php";

// Vytvoření instance třídy DatabaseConnection
$db = new DatabaseConnection();

// Získání objektu připojení k databázi pro použití v dalším kódu
$conn = $db->getConnection();

// Použití objektu připojení k databázi pro dotaz na databázi
$sql = "SELECT * FROM task";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        echo $row['name'] . " " . $row['description'] .  " " . $row['tag_id'] . " " . $row['deadline'] . " " . $row['user_id'] . " " . $row['is_complete'] . " " . $row['priority_id'] . "<br/>";
    }
} else {
    echo "0 results";
}

// Ukončení spojení s databází
$db->closeConnection();

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
        header('Location: tasks.php');
        exit();
      } else {
  
      $error = 'Přihlášení selhalo. Zkontrolujte přihlašovací údaje.';
      echo $error;
      header('Location: login.php');
      }
    }
  }

  if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      $task_id = $row['task_id'];
      $sql = "SELECT * FROM task WHERE id = $task_id";
      $result = mysqli_query($conn, $sql);
  
      if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
          $id = $row['id'];
          $name = $row['name'];
          $description = $row['description'];
          $tag_id = $row['tag_id'];
          $deadline = $row['deadline'];
          $user_id = $row['user_id'];
          $priority_id = $row['priority_id'];
  
  
          $formatted_deadline = formatDate($deadline);
  
          $tag = getTag($tag_id, $conn);
          $username = getUsername($user_id, $conn);
          $priority = getPriority($priority_id, $conn);
  
  
  
          echo "<li class=\"list-group-item list-group-item-secondary\">";
          echo "<div class=\"form-check\">";
          echo "<input type=\"checkbox\" id=\"$id\" name=\"tasks[]\" value=\"\">";
          echo "<label for=\"$id\">";
          echo "</div>"
  
  ?>
          <h2><?php echo $name; ?></h2>
          <p><?php echo $description; ?></p>
          <p>Deadline: <?php echo $formatted_deadline; ?></p>
          <p>Tag: <?php echo $tag; ?></p>
          <p>Jméno uživatele: <?php echo $username; ?></p>
          <p>Splněno: Ne</p>
          <p>Priorita: <?php echo $priority; ?></p>
  <?php
          echo "</label>";
          echo "</li>";
        }
      }
    }
  } else {
    echo "<h3>V tuto chvíli s vámi nikdo nesdílí žádné úkoly</h3>";
  }

  if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      $task_id = $row['task_id'];
      $sql = "SELECT * FROM task WHERE id = $task_id";
      $result = mysqli_query($conn, $sql);
  
      if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
          $id = $row['id'];
          $name = $row['name'];
          $description = $row['description'];
          $tag_id = $row['tag_id'];
          $deadline = $row['deadline'];
          $user_id = $row['user_id'];
          $priority_id = $row['priority_id'];
  
  
          $formatted_deadline = formatDate($deadline);
  
          $tag = getTag($tag_id, $conn);
          $username = getUsername($user_id, $conn);
          $priority = getPriority($priority_id, $conn);
  
  
  
          echo "<li class=\"list-group-item list-group-item-secondary\">";
          echo "<div class=\"form-check\">";
          echo "<input type=\"checkbox\" id=\"$id\" name=\"tasks[]\" value=\"\">";
          echo "<label for=\"$id\">";
          echo "</div>"
  
  ?>
          <h2><?php echo $name; ?></h2>
          <p><?php echo $description; ?></p>
          <p>Deadline: <?php echo $formatted_deadline; ?></p>
          <p>Tag: <?php echo $tag; ?></p>
          <p>Jméno uživatele: <?php echo $username; ?></p>
          <p>Splněno: Ne</p>
          <p>Priorita: <?php echo $priority; ?></p>
  <?php
          echo "</label>";
          echo "</li>";
        }
      }
    }
  } else {
    echo "<h3>V tuto chvíli s vámi nikdo nesdílí žádné úkoly</h3>";
  }
  
include "../database/dbcon.php";

$db = new DatabaseConnection();

$conn = $db->getConnection();

$sql = "SELECT * FROM task";
$result = mysqli_query($conn, $sql);


// Ukončení spojení s databází
$db->closeConnection();

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
        header('Location: tasks.php');
        exit();
      } else {
  
      $error = 'Přihlášení selhalo. Zkontrolujte přihlašovací údaje.';
      echo $error;
      header('Location: login.php');
      }
    }
  }

  if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      $task_id = $row['task_id'];
      $sql = "SELECT * FROM task WHERE id = $task_id";
      $result = mysqli_query($conn, $sql);
  
      if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
          $id = $row['id'];
          $name = $row['name'];
          $description = $row['description'];
          $tag_id = $row['tag_id'];
          $deadline = $row['deadline'];
          $user_id = $row['user_id'];
          $priority_id = $row['priority_id'];
  
  
          $formatted_deadline = formatDate($deadline);
  
          $tag = getTag($tag_id, $conn);
          $username = getUsername($user_id, $conn);
          $priority = getPriority($priority_id, $conn);
  
  
  
          echo "<li class=\"list-group-item list-group-item-secondary\">";
          echo "<div class=\"form-check\">";
          echo "<input type=\"checkbox\" id=\"$id\" name=\"tasks[]\" value=\"\">";
          echo "<label for=\"$id\">";
          echo "</div>"
  
  ?>
          <h2><?php echo $name; ?></h2>
          <p><?php echo $description; ?></p>
          <p>Deadline: <?php echo $formatted_deadline; ?></p>
          <p>Tag: <?php echo $tag; ?></p>
          <p>Jméno uživatele: <?php echo $username; ?></p>
          <p>Splněno: Ne</p>
          <p>Priorita: <?php echo $priority; ?></p>
  <?php
          echo "</label>";
          echo "</li>";
        }
      }
    }
  } else {
    echo "<h3>V tuto chvíli s vámi nikdo nesdílí žádné úkoly</h3>";
  }

  if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      $task_id = $row['task_id'];
      $sql = "SELECT * FROM task WHERE id = $task_id";
      $result = mysqli_query($conn, $sql);
  
      if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
          $id = $row['id'];
          $name = $row['name'];
          $description = $row['description'];
          $tag_id = $row['tag_id'];
          $deadline = $row['deadline'];
          $user_id = $row['user_id'];
          $priority_id = $row['priority_id'];
  
  
          $formatted_deadline = formatDate($deadline);
  
          $tag = getTag($tag_id, $conn);
          $username = getUsername($user_id, $conn);
          $priority = getPriority($priority_id, $conn);
  
  
  
          echo "<li class=\"list-group-item list-group-item-secondary\">";
          echo "<div class=\"form-check\">";
          echo "<input type=\"checkbox\" id=\"$id\" name=\"tasks[]\" value=\"\">";
          echo "<label for=\"$id\">";
          echo "</div>"
  
  ?>
          <h2><?php echo $name; ?></h2>
          <p><?php echo $description; ?></p>
          <p>Deadline: <?php echo $formatted_deadline; ?></p>
          <p>Tag: <?php echo $tag; ?></p>
          <p>Jméno uživatele: <?php echo $username; ?></p>
          <p>Splněno: Ne</p>
          <p>Priorita: <?php echo $priority; ?></p>
  <?php
          echo "</label>";
          echo "</li>";
        }
      }
    }
  } else {
    echo "<h3>V tuto chvíli s vámi nikdo nesdílí žádné úkoly</h3>";
  }
  
?>
?>