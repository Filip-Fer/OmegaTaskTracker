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


include 'library.php';
getFormatDate();
getDB();
getCustomSQL();

$db = new DatabaseConnection();
$conn = $db->getConnection();
$sql = "SELECT * FROM task WHERE id = $id";
$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);
$name = $row['name'];
$description = $row['description'];
$tag = $row['tag_id'];
$deadline = $row['deadline'];
$formatDeadline = $row['deadline'];
$priority = $row['priority_id'];

?>
<a href="tasks.php">Zpět k úkolům</a>

<form action="processTaskUpdate.php" method="post">
  <label for="name">Název:</label>
  <input type="text" id="name" name="name" value="<?php echo $name ?>"><br>

  <label for="description">Popis:</label>
  <textarea id="description" name="description"><?php echo $description ?></textarea><br>

  <label>Tag:</label><br>
  <input type="radio" id="tag1" name="tag" value="1" <?php if ($tag == 1) echo "checked" ?>>
  <label for="tag1">Domov</label><br>
  <input type="radio" id="tag2" name="tag" value="2" <?php if ($tag == 2) echo "checked" ?>>
  <label for="tag2">Práce</label><br>
  <input type="radio" id="tag3" name="tag" value="3" <?php if ($tag == 3) echo "checked" ?>>
  <label for="tag3">Rodina</label><br>
  <input type="radio" id="tag4" name="tag" value="4" <?php if ($tag == 4) echo "checked" ?>>
  <label for="tag4">Moje</label><br>
  <input type="radio" id="tag5" name="tag" value="5" <?php if ($tag == 5) echo "checked" ?>>
  <label for="tag5">Přátelé</label><br>
  <input type="radio" id="tag6" name="tag" value="6" <?php if ($tag == 6) echo "checked" ?>>
  <label for="tag6">Škola</label><br>
  <input type="radio" id="tag7" name="tag" value="7" <?php if ($tag == 7) echo "checked" ?>>
  <label for="tag6">Zábava</label><br>

  <label for="deadline">Deadline:</label>
  <input type="date" id="deadline" name="deadline" value="<?php echo $formatDeadline ?>"><br>

  <label>Priority:</label><br>
  <input type="radio" id="priority1" name="priority" value="1" <?php if ($priority == 1) echo "checked" ?>>
  <label for="priority1">Nízká</label><br>
  <input type="radio" id="priority2" name="priority" value="2" <?php if ($priority == 2) echo "checked" ?>>
  <label for="priority2">Střední</label><br>
  <input type="radio" id="priority3" name="priority" value="2" <?php if ($priority == 3) echo "checked" ?>>
  <label for="priority3">Vysoká</label><br>

  <input type='hidden' name='id' value='<?php echo $id; ?>' />

  <input type="submit" value="Upravit úkol">
</form>