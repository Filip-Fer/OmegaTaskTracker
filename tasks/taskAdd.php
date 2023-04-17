<?php
session_start(); // spustí session

if(isset($_SESSION['user_id'])){
    // uživatel je přihlášen, můžete pokračovat
} else {
    // uživatel není přihlášen, můžete přesměrovat na přihlašovací stránku nebo zobrazit chybovou zprávu
    header("Location: index.php");
  exit;
}
?>
<form action="processLogout.php" method="post">
    <button type="submit" name="logout">Odhlásit se</button>
</form>
<a href="tasks.php">Zpět k úkolům</a>



<form>
  <label for="name">Name:</label>
  <input type="text" id="name" name="name"><br>

  <label for="description">Description:</label>
  <textarea id="description" name="description"></textarea><br>

  <label>Tag:</label><br>
  <input type="radio" id="tag1" name="tag" value="tag1">
  <label for="tag1">Tag 1</label><br>
  <input type="radio" id="tag2" name="tag" value="tag2">
  <label for="tag2">Tag 2</label><br>
  <input type="radio" id="tag3" name="tag" value="tag3">
  <label for="tag3">Tag 3</label><br>

  <label for="deadline">Deadline:</label>
  <input type="date" id="deadline" name="deadline"><br>

  <label>Priority:</label><br>
  <input type="radio" id="priority1" name="priority" value="priority1">
  <label for="priority1">Low</label><br>
  <input type="radio" id="priority2" name="priority" value="priority2">
  <label for="priority2">Medium</label><br>
  <input type="radio" id="priority3" name="priority" value="priority3">
  <label for="priority3">High</label><br>

  <input type="submit" value="Submit">
</form>