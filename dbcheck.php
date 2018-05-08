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

    // 1. Check if we have email and password and they are not empty
    if (isset($_POST['psw']) && isset($_POST['email']) && trim($_POST['psw']) != '' && trim($_POST['email']) != '') {
        $query = "SELECT * FROM patients WHERE email = '".$_POST['email']."' AND password = '".$_POST['psw']."'";
        $result = mysqli_query($conn, $query);
        
        // Check if we found the patient
        if (mysqli_num_rows($result) > 0) {
            // Store patient/user information in the session
            //var_dump($result->fetch_assoc());
            $current_user = $result->fetch_assoc();
            
            $_SESSION['current_user'] = $current_user;
            //$_SESSION['current_user']['id'];
            
        } else {
            echo("<script>alert('Whoops! Email and password did not match. Try again!')</script>");
            echo("<script>window.location = 'HTML/index.html';</script>");
            exit; 
        }
        
    } else {
        // Check if we have an active session

        // Check if they are logged in. If not, send them to the login page
        if (isset($_SESSION['current_user']) && isset($_SESSION['current_user']['id'])) {
            // Right now we don't do anything
        } else {
            echo("<script>alert('Oops! Please log in to see the profile.')</script>");
            echo("<script>window.location = 'HTML/index.html';</script>");
            exit;
        }
    }