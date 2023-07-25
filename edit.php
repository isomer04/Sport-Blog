<?php
//include 'config.php';

$host = 'localhost:3306';
$username = 'root';
$password = '123456';
$db_name = 'sportblog';

// Establish a database connection
$conn = mysqli_connect($host, $username, $password, $db_name);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Handle the update operation separately
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["update"])) {
    $id = $_POST["id"];
    $title = $_POST["title"];
    $content = $_POST["content"];

    $sql = "UPDATE posts SET title='$title', content='$content' WHERE id=$id";

    if (mysqli_query($conn, $sql)) {
        // Redirect to index.php with debugging message
        header("Location: index.php?update_success=true");
        exit;
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}

// Fetch blog post for editing
if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["id"])) {
    $id = $_GET["id"];
    $sql = "SELECT * FROM posts WHERE id=$id";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    } else {
        echo "Error: Post not found.";
        exit;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Blog Post</title>
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
        <h1>Edit Blog Post</h1>
    <!-- Edit Post Form -->
    <div class="post-form">
        <form method="post">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <div class="form-group">
                <input type="text" class="form-control" name="title" value="<?php echo $row['title']; ?>" required>
            </div>
            <div class="form-group">
                <textarea class="form-control" name="content" required><?php echo $row['content']; ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary" name="update">Update Post</button>
            <a href="index.php">
                <button type="button" class="btn btn-secondary">Cancel</button>
            </a>
        </form>
    </div>
</main>

<!-- jQuery and Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!--<script src="script.js"></script>-->
</body>
</html>
