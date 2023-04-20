<?php
include 'library.php';
getIndexHead();
?>

<form action="processRegistration.php" method="post">
  <div class="form-group">
    <label for="username">Uživatelské jméno:</label>
    <input type="text" class="form-control" id="username" name="username" required>
  </div>
  <div class="form-group">  
    <label for="email">Email:</label>
    <input type="email" class="form-control" id="email" name="email" required>
  </div>
  <div class="form-group">
    <label for="password">Heslo:</label>
    <input type="password" class="form-control" id="password" name="password" required>
  </div>
  <button type="submit" class="btn btn-primary mt-2">Registrovat se</button>
  <p>Máte účet. Přihlašte se <a href="login.php">zde</a></p>
</form>