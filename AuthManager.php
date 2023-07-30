<?php

class AuthManager
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function isLoggedIn()
    {
        session_start();
        return isset($_SESSION['user_id']);
    }

    public function login($username, $password)
    {
        $sql = "SELECT id, password FROM users WHERE username='$username'";
        $result = mysqli_query($this->conn, $sql);

        if ($result && mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            $hashedPassword = $row['password'];

            if (password_verify($password, $hashedPassword)) {
                $_SESSION['user_id'] = $row['id'];
                header("Location: index.php");
                exit;
            } else {
                return "Invalid username or password";
            }
        } else {
            return "Invalid username or password";
        }
    }

    public function register($username, $password)
    {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (username, password) VALUES ('$username', '$hashedPassword')";

        if (mysqli_query($this->conn, $sql)) {
            $_SESSION['user_id'] = mysqli_insert_id($this->conn);
            header("Location: index.php");
            exit;
        } else {
            return "Error registering user: " . mysqli_error($this->conn);
        }
    }
}
