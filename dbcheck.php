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
    $upass = $_POST['psw'];
    $email = $_POST['email'];
    /*$sql = "SELECT * FROM patients WHERE email ='$email'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();*/

    // Test if username and password match one available in the database - not working...
    $query = "SELECT * FROM patients WHERE email='$email'";
    $result = mysqli_query($conn, $query) or die(mysql_error());
    $count = mysqli_num_rows($result);
    // If a email and username match then gather the user's data
    if($count == 1) { 
        $sql = "SELECT * FROM patients WHERE email ='$email'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
    } else{
        echo("<script>alert('Oops! We did not find your email. Please try again.')</script>");
        echo("<script>window.location = 'HTML/index.html';</script>");
        exit;
    }
        // Check that the two passwords match
    if($_POST['psw'] != $_POST['psw_r']){
        echo("<script>alert('Whoops! Your passwords did not match. Try again!')</script>");
        echo("<script>window.location = 'HTML/index.html';</script>");
        exit; 
    }

?>