<?php
//$host = 'localhost:3306';
//$username = 'root';
//$password = '123456';
//$db_name = 'sportblog';
//
//// Establish a database connection
//$conn = mysqli_connect($host, $username, $password, $db_name);
//
//if (!$conn) {
//    die("Connection failed: " . mysqli_connect_error());
//}

include 'config.php';


// CRUD Operations
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Create
    if (isset($_POST["create"])) {
        $title = $_POST["title"];
        $content = $_POST["content"];
        $category = $_POST["category"];
        $created_at = date('Y-m-d H:i:s');

        $sql = "INSERT INTO posts (title, content, category, created_at) VALUES ('$title', '$content', '$category', '$created_at')";

        if (mysqli_query($conn, $sql)) {
            header("Location: index.php");
            exit;
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }

    // Update
    if (isset($_POST["update"])) {
        $id = $_POST["post_id"];
        $title = $_POST["title"];
        $content = $_POST["content"];

        $sql = "UPDATE posts SET title='$title', content='$content' WHERE id=$id";

        if (mysqli_query($conn, $sql)) {
            header("Location: index.php");
            exit;
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
}

// Delete
if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["delete"])) {
    $id = $_GET["delete"];
    $sql = "DELETE FROM posts WHERE id=$id";

    if (mysqli_query($conn, $sql)) {
        header("Location: index.php");
        exit;
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}

// Fetch blog posts from the database
$sql = "SELECT * FROM posts ORDER BY created_at DESC";
$result = mysqli_query($conn, $sql);

// Pagination
$posts_per_page = 5;
$total_posts = mysqli_num_rows($result);
$total_pages = ceil($total_posts / $posts_per_page);

$page = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($page - 1) * $posts_per_page;

$sql = "SELECT * FROM posts ORDER BY created_at DESC LIMIT $offset, $posts_per_page";

// Searching
if (isset($_GET['search'])) {
    $search = $_GET['search'];
    $sql = "SELECT * FROM posts WHERE title LIKE '%$search%' ORDER BY created_at DESC LIMIT $offset, $posts_per_page";
} else {
    // Sorting
    $sort = isset($_GET['sort']) ? $_GET['sort'] : 'date_desc';
    switch ($sort) {
        case 'date_asc':
            $orderBy = 'created_at ASC';
            break;
        case 'title_asc':
            $orderBy = 'title ASC';
            break;
        case 'title_desc':
            $orderBy = 'title DESC';
            break;
        default:
            $orderBy = 'created_at DESC';
    }

    $sql = "SELECT * FROM posts ORDER BY $orderBy LIMIT $offset, $posts_per_page";
}

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sports Blog</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<header>
    <h1>Sports Blog</h1>
</header>

<main>
    <!-- Create Post Form -->
    <div class="post-form">
        <h3>Create Post</h3>
        <form method="post">
            <input type="text" name="title" placeholder="Title" required><br>
            <textarea name="content" placeholder="Content" required></textarea><br>
            <select name="category">
                <option value="Sports">Sports</option>
                <option value="Fitness">Fitness</option>
                <option value="Health">Health</option>
            </select><br>
            <button type="submit" name="create">Create Post</button>
        </form>
    </div>

    <!-- Display Blog Posts -->
    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <div class="post">
            <h2><?php echo $row['title']; ?></h2>
            <p><?php echo $row['content']; ?></p>
            <p>Category: <?php echo $row['category']; ?></p>
            <p>Published at: <?php echo $row['created_at']; ?></p>
            <a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a>
            <a href="?delete=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this post?')">Delete</a>
        </div>
    <?php } ?>

    <!-- Pagination links -->
    <div class="pagination">
        <?php for ($i = 1; $i <= $total_pages; $i++) { ?>
            <a href="?page=<?php echo $i; ?>" class="<?php if ($i == $page) echo 'active'; ?>">
                <?php echo $i; ?>
            </a>
        <?php } ?>
    </div>
</main>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="script.js"></script>
</body>
</html>
