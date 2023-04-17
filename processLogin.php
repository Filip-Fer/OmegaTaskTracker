<?php
// zkontrolujeme, zda byly odeslány formulářové údaje
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
  // získáme e-mailovou adresu a heslo z formuláře
  $email = $_POST["email"];
  $password = $_POST["password"];

  $password = "moje_tajne_heslo";
  $hash = password_hash($password, PASSWORD_DEFAULT);

  // zde můžeme provést ověření údajů uživatele
  // pokud se ověření podaří, můžeme uživatele přihlásit
  if ($email === 'filip.ferencei@gmail.com' && password_verify($password, $hash)) {
    session_start();
    // Přihlášení bylo úspěšné
    $_SESSION['user_id'] = 1;
    header('Location: tasks.php');
    exit();
    } else {
    // Přihlášení bylo neúspěšné
    $error = 'Přihlášení selhalo. Zkontrolujte přihlašovací údaje.';
    header('Location: login.php');
    }


}

