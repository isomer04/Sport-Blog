<?php

class Upvote
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function getUpvoteCount($post_id)
    {
        $sql = "SELECT COUNT(*) AS count FROM upvotes WHERE post_id = $post_id";
        $result = mysqli_query($this->conn, $sql);
        $row = mysqli_fetch_assoc($result);
        return $row['count'];
    }

    public function handleUpvoteRequest($post_id, $user_id)
    {
        if ($this->isLoggedIn()) {
            $sql = "SELECT * FROM upvotes WHERE post_id = $post_id AND user_id = $user_id";
            $result = mysqli_query($this->conn, $sql);

            if (mysqli_num_rows($result) === 0) {
                $sql = "INSERT INTO upvotes (post_id, user_id) VALUES ($post_id, $user_id)";
                mysqli_query($this->conn, $sql);
            }
        }
    }

    private function isLoggedIn()
    {
        session_start();
        return isset($_SESSION['user_id']);
    }
}
