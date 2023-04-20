<?php
include 'library.php';
getIndexHead();
?>

<form action="processLogin.php" method="POST">
<div class="form-group">  
  <label for="email">Email:</label>
  <input type="email" class="form-control id="email" name="email" required>
</div>
<div class="form-group">
  <label for="password">Heslo:</label>
  <input type="password" class="form-control" id="password" name="password" required>
</div>
  <button type="submit" class="btn btn-primary mt-2">Přihlásit se</button>
  <p>Nemáte účet. Registrujte se <a href="registration.php">zde</a></p>
</form>