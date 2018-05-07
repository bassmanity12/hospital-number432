<?php
$servername = "ec2-18-197-115-58.eu-central-1.compute.amazonaws.com";
$username = "group_4_user";
$password = "MJkdJqyrXwZGKUxT";
$dbname = "group_4_user_medical";
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>