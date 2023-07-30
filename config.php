<?php
if (basename(__FILE__) === basename($_SERVER['SCRIPT_FILENAME'])) {
    header('HTTP/1.0 403 Forbidden');
    die("Direct access not allowed.");
}

$host = 'localhost:3306';
$username = 'root';
$password = '123456';
$db_name = 'sportblog';
?>
