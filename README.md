# Sports Blog

Sports Blog is a simple blogging platform built with PHP and MySQL. Users can register, login, create, edit, and delete blog posts, as well as upvote posts they like. The application also supports pagination, sorting, and searching for blog posts.

## Features

- User registration and login functionality.
- CRUD (Create, Read, Update, Delete) operations for blog posts.
- Upvote feature for blog posts.
- Pagination to display a limited number of posts per page.
- Sorting posts by date or title.
- Searching for blog posts by title.

## Installation

1. Clone the repository:
```bash
git clone https://github.com/your-username/sports-blog.git
```

2. Set up the database:

   - Create a MySQL database named `sportblog`.
   - Import the `sportblog.sql` file provided in the `database` folder.

3. Configure the database connection:

   - Open the `index.php` file and modify the `$host`, `$username`, `$password`, and `$db_name` variables to match your MySQL database settings.

4. Run the application:

   - You can use a local development server like XAMPP or WAMP to run the PHP application.

## Usage

1. Browse to the root directory of the application using your web server (e.g., `http://localhost/sports-blog/`).

2. If you're a new user, click on the "Register" link in the navigation bar to create an account.

3. After registering, you can log in using your credentials.

4. Once logged in, you can create new blog posts, edit or delete existing ones, and upvote posts.

5. Use the sorting and searching options to find specific blog posts.

## Contributing

Contributions are welcome! If you find a bug or want to add new features, feel free to open an issue or submit a pull request.

## License

This project is licensed under the [MIT License](LICENSE).





