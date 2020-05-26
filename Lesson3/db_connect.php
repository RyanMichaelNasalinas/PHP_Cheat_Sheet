<?php
// Data Source
$dsn = 'mysql:host=localhost;dbname=database_students';
// Error handling
try {
    $db = new PDO($dsn, 'root', '');
} catch (PDOException $e) {
    $err_msg = $e->getMessage();
    // Import the errors from another field
    include('db_error.php');
    exit();
}
