<?php
/**
 * Třída pro databázové spojení
 * 
 * @author Filip Ferencei
 */
class DatabaseConnection {
    private $host;
    private $username;
    private $password;
    private $database;
    private $connection;

    /**
     * Konstruktor pro třídu DatabaseConnection
     */
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

    /**
     * Funkce pro vytoření spojení s databází
     * 
     * @return object $conn
     */
    public function getConnection() {
        return $this->connection;
    }

    /**
     * Funkce pro ukončení spojení s databází
     */
    public function closeConnection() {
        mysqli_close($this->connection);
    }



}

?>