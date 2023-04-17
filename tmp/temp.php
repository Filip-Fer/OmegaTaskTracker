<?php

include "../database/dbcon.php";

// Vytvoření instance třídy DatabaseConnection
$db = new DatabaseConnection();

// Získání objektu připojení k databázi pro použití v dalším kódu
$conn = $db->getConnection();

// Použití objektu připojení k databázi pro dotaz na databázi
$sql = "SELECT * FROM task";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        echo $row['name'] . " " . $row['description'] .  " " . $row['tag_id'] . " " . $row['deadline'] . " " . $row['user_id'] . " " . $row['is_complete'] . " " . $row['priority_id'] . "<br/>";
    }
} else {
    echo "0 results";
}

// Ukončení spojení s databází
$db->closeConnection();
?>