<?php
session_start();


if (isset($_SESSION['user_id'])) {
  include 'library.php';
  getTaskHead();
} else {
  header("Location: index.php");
  exit;
}

if (isset($_POST['id'])) {
    $task_id = $_POST['id'];
}

?>

<form action="processTaskShare.php" method="post">
<div class="form-group">
  <label for="email">Email uživatele:</label>
  <input type="email" class="form-control" id="email" name="email" required>
</div>
  <input type="hidden" name="id" value="<?php echo $task_id; ?>">
  <input type="submit" value="Sdílet" class="btn btn-secondary mt-2">
  
</form>
<form action="tasks.php">
  <input type="submit" class="btn btn-danger mt-2" value="Zrušit"></input>
</form>



