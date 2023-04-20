<?php
require 'config.php';
$config = Config::getInstance();

include 'library.php';
getIndexHead();
?>

<main>
  <h1 class="text-center">TODO Tracker</h1>
  <h2 class="text-center">Začněte díky TODO Trackeru žít organizovaně a klidně</h2>
  <p class="text-center"><a style="text-decoration: none; color: darkgrey" href="registration.php">Začněte používat TODO Tracker ještě dnes</a></p>
  <ul style="list-style-type: none;">
    <li>
      <h4 class="text-center">Vytvářejte nové projekty</h4>
    </li>
    <li>
      <h4 class="text-center">Přiřazujte si tagy k úkolům</h4>
    </li>
    <li>
      <h4 class="text-center">Nastavte si termín splnění</h4>
    </li>
    <li>
      <h4 class="text-center">Sdílejte úkoly s ostatními uživateli</h4>
    </li>
  </ul>
</main>

