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
                      $sql = "SELECT * FROM patients WHERE email ='$email'";
                      $result = $conn->query($sql);
                      $row = $result->fetch_assoc();
if($result->num_rows == 0) {

    $_SESSION["error"] = "email not found in database try again";
    $error = "password does not match";

    header("location: HTML/login.html");
    echo("email not found");


}
if($upass != $row['password']) {
echo("passwords dont match");
}
else{


 pass;



}

?>