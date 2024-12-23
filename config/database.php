<?php
 use Dotenv\Dotenv;

 require '../vendor/autoload.php'; // Composer autoloader 
 //make sure to give the right path to the autoloader file.

 // Load .env file from the root of your project
 $dotenv = Dotenv::createImmutable(dirname(__DIR__));
 $dotenv->load();
/**
 * Connect to a MySQL database using the mysqli extension.
 *
 * This function establishes a connection to a MySQL database. If the
 * connection fails, it logs an error and terminates the program.
 *
 * @return A MySQLi connection object.
 */
function connect_db() {

    $mysqli = mysqli_connect($_ENV['HOST'], $_ENV['USERNAME'], $_ENV['PASSWORD'], $_ENV['DATABASE']);
    
    if (mysqli_connect_errno()) {
        error_log("Connection failed: " . mysqli_connect_error());
        die("Connection failed. Please try again later.");
    }
    
    return $mysqli;
}