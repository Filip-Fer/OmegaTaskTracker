<?php
session_start();


if (isset($_SESSION['user_id'])) {

} else {
  header("Location: index.php");
  exit;
}

if (isset($_POST['id'])) {
    $id = $_POST['id'];
}
?>

<form action="processTaskShare.php" method="post">
  <label for="email">Email uživatele:</label>
  <input type="email" id="email" name="email" required>
  <input type="hidden" name="id" value="<?php echo $id; ?>">
  <input type="submit" value="Sdílet">
</form>

<a href="tasks.php">Zpět k úkolům</a>


