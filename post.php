<?php

class Post
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function createPost($title, $content, $category)
    {
        $created_at = date('Y-m-d H:i:s');
        $sql = "INSERT INTO posts (title, content, category, created_at) VALUES ('$title', '$content', '$category', '$created_at')";

        if (mysqli_query($this->conn, $sql)) {
            header("Location: index.php");
            exit;
        } else {
            echo "Error: " . mysqli_error($this->conn);
        }
    }

    public function updatePost($id, $title, $content)
    {
        $sql = "UPDATE posts SET title='$title', content='$content' WHERE id=$id";

        if (mysqli_query($this->conn, $sql)) {
            header("Location: index.php");
            exit;
        } else {
            echo "Error: " . mysqli_error($this->conn);
        }
    }

    public function deletePost($id)
    {
        $sql = "DELETE FROM posts WHERE id=$id";

        if (mysqli_query($this->conn, $sql)) {
            header("Location: index.php");
            exit;
        } else {
            echo "Error deleting record: " . mysqli_error($this->conn);
        }
    }

    public function getPosts($page, $posts_per_page)
    {
        $offset = ($page - 1) * $posts_per_page;
        $sql = "SELECT * FROM posts ORDER BY created_at DESC LIMIT $offset, $posts_per_page";
        $result = mysqli_query($this->conn, $sql);
        return $result;
    }

    public function getPostById($id)
    {
        $sql = "SELECT * FROM posts WHERE id=$id";
        $result = mysqli_query($this->conn, $sql);
        return mysqli_fetch_assoc($result);
    }

    public function searchPosts($searchQuery, $page, $posts_per_page)
    {
        $offset = ($page - 1) * $posts_per_page;
        $sql = "SELECT * FROM posts WHERE title LIKE '%$searchQuery%' ORDER BY created_at DESC LIMIT $offset, $posts_per_page";
        $result = mysqli_query($this->conn, $sql);
        return $result;
    }
}
