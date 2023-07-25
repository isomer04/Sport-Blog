<?php
$host = 'localhost:3306';
$username = 'root';
$password = '123456';
$db_name = 'sportblog';

// Establish a database connection
$conn = mysqli_connect($host, $username, $password, $db_name);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

//include 'config.php';


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
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Minty Bootswatch Theme CSS -->
    <link rel="stylesheet" href="https://bootswatch.com/4/minty/bootstrap.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="#">Sports Blog</a>

        <!-- Search Bar -->
        <div class="search-bar ml-auto">
            <form class="form-inline" method="get">
                <input type="text" class="form-control mr-2" name="search" id="search"
                    placeholder="Search posts by title">
                <button type="submit" class="btn btn-success">Search</button>
            </form>
        </div>
    </nav>


    <main class="container mt-4"> 
        <div class="post-form">
            <h3>Create Post</h3>
            <form method="post">
                <div class="form-group">
                    <input type="text" class="form-control" name="title" placeholder="Title" required>
                </div>
                <div class="form-group">
                    <textarea class="form-control" name="content" placeholder="Content" required></textarea>
                </div>
                <div class="form-group">
                    <select class="form-control" name="category">
                        <option value="Sports">Sports</option>
                        <option value="Fitness">Fitness</option>
                        <option value="Health">Health</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary" name="create">Create Post</button>
            </form>
        </div>

        <!-- Sort Bar -->
        <div class="sort-bar ml-auto">
            <label class="text-white mr-2" for="sort">Sort by:</label>
            <select id="sort" class="form-control" onchange="sortPosts()">
                <option value="date_desc" <?php if ($sort === 'date_desc')
                    echo 'selected'; ?>>Date (Newest First)
                </option>
                <option value="date_asc" <?php if ($sort === 'date_asc')
                    echo 'selected'; ?>>Date (Oldest First)</option>
                <option value="title_asc" <?php if ($sort === 'title_asc')
                    echo 'selected'; ?>>Title (A-Z)</option>
                <option value="title_desc" <?php if ($sort === 'title_desc')
                    echo 'selected'; ?>>Title (Z-A)</option>
            </select>
        </div>

        <!-- Display Blog Posts -->
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <div class="post card mt-4">
                <div class="card-body">
                    <h2 class="card-title">
                        <?php echo $row['title']; ?>
                    </h2>
                    <p class="card-text">
                        <?php echo $row['content']; ?>
                    </p>
                    <p>Category:
                        <?php echo $row['category']; ?>
                    </p>
                    <p>Published at:
                        <?php echo $row['created_at']; ?>
                    </p>
                    <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-warning">Edit</a>
                    <a href="?delete=<?php echo $row['id']; ?>"
                        onclick="return confirm('Are you sure you want to delete this post?')"
                        class="btn btn-danger">Delete</a>
                </div>
            </div>
        <?php } ?>

        <!-- Pagination links -->
        <div class="pagination mt-4">
            <?php for ($i = 1; $i <= $total_pages; $i++) { ?>
                <a href="?page=<?php echo $i; ?>" class="btn btn-primary <?php if ($i == $page)
                       echo 'active'; ?>">
                    <?php echo $i; ?>
                </a>
            <?php } ?>
        </div>
    </main>

    <!-- jQuery and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function () {
            // Handle the form submission on Enter key press
            $('#search').keydown(function (event) {
                if (event.keyCode == 13) {
                    event.preventDefault();
                    searchPosts();
                }
            });

            // Handle the form submission on Search button click
            $('form').submit(function (event) {
                event.preventDefault();
                searchPosts();
            });
        });

        function searchPosts() {
            var searchQuery = $('#search').val();
            window.location.href = 'index.php?search=' + searchQuery;
        }

        function sortPosts() {
            var sortBy = $('#sort').val();
            window.location.href = 'index.php?sort=' + sortBy;
        }
    </script>
</body>

</html>