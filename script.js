$(document).ready(function() {
    function loadPosts() {
        // Fetch posts from the server using AJAX and display them on the page
        // ...

        // Update the pagination links
        // ...
    }

    function updatePosts() {
        // Get the sorting option selected by the user
        var sortValue = $('#sort').val();

        // Get the search query entered by the user
        var searchQuery = $('#search').val();

        // Make an AJAX request to fetch the updated posts based on sorting and searching
        $.ajax({
            url: 'index.php',
            type: 'GET',
            dataType: 'html',
            data: {
                sort: sortValue,
                search: searchQuery
            },
            success: function(data) {
                // Update the blog posts section with the new data
                $('#blog-posts').html(data);
            },
            error: function(xhr, status, error) {
                console.log('Error: ' + error);
            }
        });
    }

    // Load the initial set of posts
    loadPosts();

    // Update the posts when the sorting option changes
    $('#sort').on('change', function() {
        updatePosts();
    });

    // Update the posts when the user searches for a post
    $('#search').on('keyup', function() {
        updatePosts();
    });
});
