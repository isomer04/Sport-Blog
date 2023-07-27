<?php
// post.php
include 'config.php';
// Same database connection and error handling code as in index.php

// Check if the post ID is provided in the query parameter
if (isset($_GET['id'])) {
    $postId = $_GET['id'];

    // Fetch the blog post from the database based on the ID
    $sql = "SELECT * FROM posts WHERE id = $postId";
    $result = mysqli_query($conn, $sql);

    // Check if the post exists
    if ($result && mysqli_num_rows($result) === 1) {
        $post = mysqli_fetch_assoc($result);
    } else {
        // Post not found, handle the error appropriately (e.g., display a message or redirect to the homepage)
        echo "Post not found.";
        exit;
    }
} else {
    // No post ID provided in the query parameter, handle the error appropriately (e.g., display a message or redirect to the homepage)
    echo "Post ID not provided.";
    exit;
}

// Now, you can display the full content of the post in the post.php file.
?>


<!DOCTYPE html>
<html>
<head>
    <title>Full Blog Post</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Minty Bootswatch Theme CSS -->
    <link rel="stylesheet" href="https://bootswatch.com/4/minty/bootstrap.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="index.php">Sports Blog</a>
</nav>


<main class="container mt-4">
    <h2><?php echo $post['title']; ?></h2>
    <p><?php echo $post['content']; ?></p>
    <!-- Add more details if needed, such as category, published date, etc. -->
</main>

<!-- jQuery and Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!--<script src="script.js"></script>-->
</body>
</html>