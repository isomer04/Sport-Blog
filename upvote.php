<?php
// upvote.php

session_start();

$host = 'localhost:3306';
$username = 'root';
$password = '123456';
$db_name = 'sportblog';

// Establish a database connection
$conn = mysqli_connect($host, $username, $password, $db_name);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["post_id"]) && isset($_POST["user_id"])) {
    $postId = $_POST["post_id"];
    $userId = $_POST["user_id"];

    // Check if the user has already upvoted this post
    $sql = "SELECT COUNT(*) AS count FROM upvotes WHERE post_id = $postId AND user_id = $userId";
    $result = mysqli_query($conn, $sql);
    $upvoted = mysqli_fetch_assoc($result)['count'] > 0;

    if (!$upvoted) {
        // If the user has not upvoted, update the upvote count in the posts table and add an upvote record to the upvotes table
        $sqlUpdate = "UPDATE posts SET upvotes = upvotes + 1 WHERE id = $postId";
        $sqlInsert = "INSERT INTO upvotes (post_id, user_id) VALUES ($postId, $userId)";

        if (mysqli_query($conn, $sqlUpdate) && mysqli_query($conn, $sqlInsert)) {
            echo json_encode(array('success' => true));
        } else {
            echo json_encode(array('success' => false));
        }
    } else {
        // If the user has already upvoted, return an error response
        echo json_encode(array('success' => false, 'message' => 'Already upvoted.'));
    }
}
?>
