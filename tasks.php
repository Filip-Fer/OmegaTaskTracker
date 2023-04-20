<?php
session_start();

if (isset($_SESSION['user_id'])) {
  include 'library.php';
  getTaskHead();
} else {
  header("Location: index.php");
  exit;
}
?>
<h1 class="text-center">Vaše úkoly</h1>
<ul class="list-group">
  <?php

  getFormatDate();
  getDB();
  getCustomSQL();


  $db = new DatabaseConnection();
  $conn = $db->getConnection();
  $loggedUser = $_SESSION['user_id'];
  $sql = "SELECT * FROM task WHERE user_id = $loggedUser";
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
      echo "<input class=\"form-check-input\" type=\"checkbox\" id=\"$id\" name=\"tasks[]\" value=\"\">";
      echo "<label class=\"form-check-label\" for=\"$id\">";
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
      echo "<form method='post' action='taskShare.php'>";
      echo "<input type='hidden' name='id' value='$id'>";
      echo "<input class=\"btn btn-secondary mt-2\" type='submit' value='Sdílet úkol'>";
      echo "</form>";

      echo "<form method='post' action='taskUpdate.php'>";
      echo "<input type='hidden' name='id' value='$id'>";
      echo "<input class=\"btn btn-secondary mt-2\" type='submit' value='Upravit úkol'>";
      echo "</form>";

      echo "</label>";
      echo "</div>";
      echo "</li>";
    }
  } else {
    echo "<h3>V tuto chvíli nemáte žádné úkoly</h3>";
  }

  ?>
</ul>

<h1 class="text-center pt-5">Sdílené úkoly</h1>
<?php

$sql = "SELECT * FROM shared_task WHERE user_id = $loggedUser";
$result = mysqli_query($conn, $sql);

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

$db->closeConnection();
?>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
  $(document).ready(function() {
    $('input[type="checkbox"]').change(function() {
      if ($(this).is(":checked")) {
        var id = $(this).attr("id");
        $.ajax({
          url: "taskDone.php",
          type: "POST",
          data: {
            id: id
          },
          success: function() {
            $('input[type="checkbox"]:checked').closest('li').remove();
          }
        });
      }
    });
  });
</script>