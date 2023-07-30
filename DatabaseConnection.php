<?php

class DatabaseConnection
{
    private $host;
    private $username;
    private $password;
    private $db_name;
    private $conn;

    public function __construct($host, $username, $password, $db_name)
    {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->db_name = $db_name;
    }

    public function connect()
    {
        $this->conn = mysqli_connect($this->host, $this->username, $this->password, $this->db_name);
        if (!$this->conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
    }

    public function getConnection()
    {
        return $this->conn;
    }
}
