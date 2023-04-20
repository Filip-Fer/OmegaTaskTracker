<?php
/**
 * Funkce pro získání tagu z databaze podle id
 * 
 * @param integer $id
 * @param object $conn
 * @return string $name
 */
function getTag($id, $conn) {
    $sql = "SELECT name FROM tag WHERE id = $id";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $name = $row['name'];
            return $name;
        }
    }
}

/**
 * Funkce pro získání priority z databáze podle id
 * 
 * @param integer $id
 * @param object $conn
 * @return string $name
 */
function getPriority($id, $conn) {
    $sql = "SELECT name FROM priority WHERE id = $id";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $name = $row['name'];
            return $name;
        }
    }
}

/**
 * Funkce pro získání jména uživatele podle id
 * 
 * @param integer $id
 * @param object $conn
 * @return string $username 
 */
function getUsername($id, $conn) {
    $sql = "SELECT username FROM user WHERE id = $id";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $username = $row['username'];
            return $username;
        }
    }
}  



/**
 * Funkce pro smazání tasku podle id
 * 
 * @param integer $id
 * @param object $conn
 */
function deleteTask($id, $conn) {
    $sql = "DELETE FROM shared_task WHERE task_id = $id";
    $conn->query($sql);

    $sql = "DELETE FROM task WHERE id = $id";
    $conn->query($sql);
}

/**
 * Funkce pro získání user_id podle emailu
 * 
 * @param string $email
 * @param object $conn
 * @return integer $user_id
 */
function getUserByEmail($email, $conn) {
    $sql = "SELECT * FROM user WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $user_id = $row['id'];
            $username = $row['username'];
            return $user_id;
        }
    }
}  

/**
 * Funkce pro získání emailu podle id
 * 
 * @param integer $id
 * @param object $conn
 * @return string $email
 */
function getUserEmailById($id, $conn) {
    $sql = "SELECT * FROM user WHERE email = '$id'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $email = $row['email'];
            return $email;
        }
    }
}  

/**
 * Funkce pro získání tasku podle id
 * 
 * @param integer $id
 * @param object $conn
 * @return integer $task_id
 */
function getTaskById($id, $conn) {
    $sql = "SELECT * FROM task WHERE id = $id";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $task_id = $row['id'];
            $username = $row['username'];
            return $task_id;
        }
    }
}

/**
 * Funkce pro zjištění zda je email v databázi
 * 
 * @param string $email
 * @param object $conn
 * @return boolean $result
 */
function emailExistsInDatabase($email, $conn) {
    $sql = "SELECT COUNT(*) as count FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    $row = mysqli_fetch_assoc($result);
    $count = $row["count"];
  
    if ($count > 0) {
        $result = true;
        return $result;
    } else {
        $result = false;
        return $result;
    }
  }

/**
 * Funkce pro zjištění zda je username v databázi
 * 
 * @param string $username
 * @param object $conn
 * @return boolean $result
 */
function usernameExistsInDatabase($username, $conn) {
    $sql = "SELECT COUNT(*) as count FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);

    $row = mysqli_fetch_assoc($result);
    $count = $row["count"];

    if ($count > 0) {
        $result = true;
        return $result;
    } else {
        $result = false;
        return $result;
    }
}


?>