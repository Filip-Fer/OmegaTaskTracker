<?php
session_start();

if(isset($_SESSION['user_id'])){
    include 'library.php';
    getTaskHead();
} else {
    header("Location: index.php");
  exit;
}
?>
<form action="processTaskAdd.php" method="post">
  <div class="form-group">
    <label for="name">Název:</label>
    <input class="form-control" type="text" id="name" name="name"><br>
  </div>
  <div class="form-group">  
    <label for="description">Popis:</label>
    <textarea class="form-control" id="description" name="description"></textarea><br>
  </div>
  <label>Tag:</label><br>
  <div class="form-check">
    <input class="form-check-input" type="radio" id="tag1" name="tag" value="1">
    <label class="form-check-label" for="tag1">Domov</label><br>
  </div>
  <div class="form-check">
    <input class="form-check-input" type="radio" id="tag2" name="tag" value="2">
    <label class="form-check-label" for="tag2">Práce</label><br>
  </div>
  <div class="form-check">
    <input class="form-check-input" type="radio" id="tag3" name="tag" value="3">
    <label class="form-check-label" for="tag3">Rodina</label><br>
  </div>
  <div class="form-check">
    <input class="form-check-input" type="radio" id="tag4" name="tag" value="4">
    <label class="form-check-label" for="tag4">Moje</label><br>
  </div>
  <div class="form-check">
    <input class="form-check-input" type="radio" id="tag5" name="tag" value="5">
    <label class="form-check-label" for="tag5">Přátelé</label><br>
  </div>
  <div class="form-check">
    <input class="form-check-input" type="radio" id="tag6" name="tag" value="6">
    <label class="form-check-label" for="tag6">Škola</label><br>
  </div>
  <div class="form-check">
    <input class="form-check-input" type="radio" id="tag7" name="tag" value="7">
    <label class="form-check-label" for="tag6">Zábava</label><br>
  </div>

  <label for="deadline">Deadline:</label>
  <input class="form-control" type="date" id="deadline" name="deadline"><br>

  <label>Priority:</label><br>
  <div class="form-check">
    <input class="form-check-input" type="radio" id="priority1" name="priority" value="1">
    <label class="form-check-label" for="priority1">Nízká</label><br>
  </div>
  <div class="form-check">
    <input class="form-check-input" type="radio" id="priority2" name="priority" value="2">
    <label class="form-check-label" for="priority2">Střední</label><br>
  </div>
  <div class="form-check">
    <input class="form-check-input" type="radio" id="priority3" name="priority" value="3">
    <label class="form-check-label" for="priority3">Vysoká</label><br>
  </div>

  <input class="btn btn-secondary mt-2" type="submit" value="Přidat">
</form>
<form action="tasks.php">
  <input type="submit" class="btn btn-danger mt-2" value="Zrušit"></input>
</form>