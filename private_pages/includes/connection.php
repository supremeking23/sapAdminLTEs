<?php
define("DB_SERVER", "localhost");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_NAME", "sappdb"); // database name


$connection = new mysqli(DB_SERVER,DB_USER,DB_PASS,DB_NAME);


// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";

?>
