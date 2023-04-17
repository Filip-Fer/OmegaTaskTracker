<?php
session_start(); // spustí session

if (isset($_SESSION['user_id'])) {
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
<a href="taskAdd.php">Přidat úkol</a>


<ul>
  <?php
  $db = new DatabaseConnection();
  $conn = $db->getConnection();
  $sql = "SELECT * FROM task";
  $result = mysqli_query($conn, $sql);

  

  if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
      $id = $row['id']; 
      $name = $row['name'];
      $description = $row['description'];
      $tag_id = $row['tag_id'];
      $deadline = ['deadline'];
      $user_id = ['user_id'];
      $is_completed = ['is_complete'];
      $priority_id = ['priority_id'];

      $priority_sql = "SELECT name FROM priority WHERE id = $priority_id";
      $priority = mysqli_query($conn, $priority_sql);

      $user_sql = "SELECT name FROM user WHERE id = $user_id";
      $username = mysqli_query($conn, $user_sql);

      $date_parts = explode('-', $date);
      $year = $date_parts[0];
      $month = $date_parts[1];
      $day = $date_parts[2];

      $formatted_date = $day . '. ' . intval($month) . '. ' . $year;


      echo "<li>";
      echo "<input type=\"checkbox\" id=\"$id\" name=\"tasks[]\" value=\"$item\">";
      echo "<label for=\"$id\">";
      ?>
      <h2><?php echo $name; ?></h2>
      <p><?php echo $description; ?></p>
      <p>Deadline: <?php echo $deadline; ?></p>
      <p>Tag: <?php echo $task_tag; ?></p>
      <p>Jméno uživatele: <?php echo $username; ?></p>
      <p>Splněno: Ne</p>
      <p>Priorita: <?php echo $priority; ?></p>
      <?php
      echo "</label>";
      echo "</li>";
    }
  } else {
    echo "<h3>V tuto chvíli nemáte žádné úkoly</h3>";
  }

  ?>
</ul>


<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
  $(document).ready(function() {
    $('input[type="checkbox"]').change(function() {
      if ($(this).is(":checked")) {
        var itemValue = $(this).val();
        $.ajax({
          url: "taskDelete.php",
          type: "POST",
          data: {
            item: itemValue
          },
          success: function() {
            $('input[type="checkbox"]:checked').closest('li').remove();
          }
        });
      }
    });
  });
</script>