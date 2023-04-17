<?php
class DatabaseConnection {
    private $host;
    private $username;
    private $password;
    private $database;
    private $connection;

    public function __construct() {
        $this->host = "localhost";
        $this->username = "tasktracker_conn";
        $this->password = "student";
        $this->database = "task_tracker";

        $this->connection = mysqli_connect($this->host, $this->username, $this->password, $this->database);
        if (!$this->connection) {
            die("Chyba při připojování k databázi: " . mysqli_connect_error());
        }
    }

    public function getConnection() {
        return $this->connection;
    }

    public function closeConnection() {
        mysqli_close($this->connection);
    }
}
?>