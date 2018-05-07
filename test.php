<?php
/**
 * Created by PhpStorm.
 * User: b
 * Date: 07.05.2018
 * Time: 13:17
 */
$servername = "ec2-18-197-115-58.eu-central-1.compute.amazonaws.com";
$username = "group_4_user";
$pass = "MJkdJqyrXwZGKUxT";
$dbname = "group_4_user_medical";
$fname = "test";
$lname = "tester";
$gender = "Male";
$password = "asasa";
$email = "fasa@gmal.com";
$age = 12;



$conn = mysqli_connect($servername, $username, $pass, $dbname);
$sql  = "INSERT INTO patients(fname,lname,gender,email,age,password) VALUES ('$fname','$lname','$gender','$email','$age','$password')";
if (mysqli_query($conn, $sql)) {
//    echo("$fname");
//    echo "New record created successfully";
    header('Location:HTML/login.html');
}
else{
    echo ("Noooooooo");
}