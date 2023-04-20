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
 * Funkce pro získání priority z databáze podle id
 * 
 * @param integer $id
 * @param object $conn
 * @return string $name
 */
function getPriorityByName($name, $conn) {
    $sql = "SELECT id FROM priority WHERE name = $name";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['id'];
            return $id;
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
 * Funkce pro získání priority z databáze podle id
 * 
 * @param integer $id
 * @param object $conn
 * @return string $name
 */
function getPriorityNameById($id, $conn) { return
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
    $sql = "SELECT * FROM user WHERE id = $id";
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
    $sql = "SELECT COUNT(*) as count FROM user WHERE email = '$email'";
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
    $sql = "SELECT COUNT(*) as count FROM user WHERE username = '$username'";
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
 * Funkce pro získání user_id podle emailu
 * 
 * @param string $email
 * @param object $conn
 * @return integer $user_id
 */
function getUserIdByEmail($email, $conn) {
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
 * Funkce pro získání username podle emailu
 * 
 * @param string $email
 * @param object $conn
 * @return string $usernme
 */
function getUsernameByEmail($email, $conn) {
    $sql = "SELECT username FROM user WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $username = $row['username'];
            return $username;
        }
    }
}  

/**
 * Funkce pro získání emailu podle username
 * 
 * @param string $username
 * @param object $conn
 * @return string $email
 */
function getUserEmailByUsername($username, $conn) {
    $sql = "SELECT * FROM user WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $user_id = $row['id'];
            $email = $row['email'];
            return $email;
        }
    }
}  

/**
 * Funkce pro získání tasku podle id
 * 
 * @param string $name
 * @param object $conn
 * @return integer $task_id
 */
function getTaskIdByName($name, $conn) {
    $sql = "SELECT * FROM task WHERE name = '$name'";
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
 * Funkce pro získání tasku podle id
 * 
 * @param string $description
 * @param object $conn
 * @return integer $task_id
 */
function getTaskIdByDescription($description, $conn) {
    $sql = "SELECT * FROM task WHERE description = $description";
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
 * Funkce pro získání jména uživatele podle id
 * 
 * @param integer $id
 * @param object $conn
 * @return string $username 
 */
function getUsernam($id, $conn) {
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
 * Funkce pro získání priority z databáze podle id
 * 
 * @param integer $id
 * @param object $conn
 * @return string $name
 */
function getPrioNameById($id, $conn) { return
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
 * Funkce pro smazání tasku podle id
 * 
 * @param integer $id
 * @param object $conn
 */
function deleteTaskById($id, $conn) {
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
function getUserByMail($email, $conn) {
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
function getUserMailById($id, $conn) {
    $sql = "SELECT * FROM user WHERE id = $id";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $email = $row['email'];
            return $email;
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
function emailExistsInDB($email, $conn) {
    $sql = "SELECT COUNT(*) as count FROM user WHERE email = '$email'";
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
function usernameExistsInDB($username, $conn) {
    $sql = "SELECT COUNT(*) as count FROM user WHERE username = '$username'";
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
 * Funkce pro získání user_id podle emailu
 * 
 * @param string $email
 * @param object $conn
 * @return integer $user_id
 */
function getUserIdByEmai($email, $conn) {
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
 * Funkce pro získání username podle emailu
 * 
 * @param string $email
 * @param object $conn
 * @return string $usernme
 */
function getUsernameByEmai($email, $conn) {
    $sql = "SELECT username FROM user WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $username = $row['username'];
            return $username;
        }
    }
}  

/**
 * Funkce pro získání emailu podle username
 * 
 * @param string $username
 * @param object $conn
 * @return string $email
 */
function getUserEmailByUsernam($username, $conn) {
    $sql = "SELECT * FROM user WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $user_id = $row['id'];
            $email = $row['email'];
            return $email;
        }
    }
}  

/**
 * Funkce pro získání tasku podle id
 * 
 * @param string $name
 * @param object $conn
 * @return integer $task_id
 */
function getTaskIdByNam($name, $conn) {
    $sql = "SELECT * FROM task WHERE name = '$name'";
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
 * Funkce pro získání tasku podle id
 * 
 * @param string $description
 * @param object $conn
 * @return integer $task_id
 */
function getTaskIdByDesc($description, $conn) {
    $sql = "SELECT * FROM task WHERE description = $description";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $task_id = $row['id'];
            $username = $row['username'];
            return $task_id;
        }
    }
}

?>