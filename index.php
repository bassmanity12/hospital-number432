<?php
/**
 * Created by PhpStorm.
 * User: b
 * Date: 01.05.18
 * Time: 13:52
 */
$servername = "localhost";
$username = "root";
$password = " ";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>