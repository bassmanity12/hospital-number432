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

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$age = $_POST['age'];
$pass = $_POST['psw'];
$passc = $_POST['pswc'];
$check_db = "SELECT * FROM patients WHERE email ='$email'";
$result = $conn->query($check_db);
$row = $result->fetch_assoc();


if($result->num_rows == 0) {
    $sql = "INSERT INTO patients(fname,lname,gender,email,age,password) VALUES ('$fname','$lname','$gender','$email','$age','$pass')";

    if (mysqli_query($conn, $sql)) {
//    echo("$fname");
//    echo "New record created successfully";
        header('Location:HTML/login.html');
    }
}
else{
    echo("email already exist please try different e-mail");
    header("Location: HTML/index.html");

}

?>