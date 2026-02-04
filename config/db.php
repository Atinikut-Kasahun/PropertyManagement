<?php
$host = "localhost";
$port = "5432";
$user = "postgres";
$db = "property_db";
$pass = "your_password";

$conn = pg_connect("host=$host port=$port dbname=$db user=$user password=$pass");

if (!$conn) {
    die("Database Connection Failed: " . pg_last_error());
}

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>