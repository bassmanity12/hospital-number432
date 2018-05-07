<?php
    $servername = "ec2-18-197-115-58.eu-central-1.compute.amazonaws.com";
    $username = "group_4_user";
    $pass = "MJkdJqyrXwZGKUxT";
    $dbname = "group_4_user_medical";
    $conn = mysqli_connect($servername, $username, $pass, $dbname);
     // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    if (isset($_POST['email'])){
        $email = $_POST['email'];
        $sql = "SELECT * FROM patients WHERE email ='$email'";
        $result = $conn->query($sql);
    }
?>