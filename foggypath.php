<?php
   $mservername = "ec2-18-197-115-58.eu-central-1.compute.amazonaws.com";
    $musername = "group_4_user";
    $mpass = "MJkdJqyrXwZGKUxT";
    $mdbname = "group_4_user_medical";
$connection=mysqli_connect( $mservername, $musername, $mpass, $mdbname);
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }


if(isset($_POST) & !empty($_POST)){
	$email =  $_POST['email'];
	$sql = "SELECT password FROM `patients` WHERE email = '$email'";
	$res = mysqli_query($connection, $sql);
	$count = mysqli_num_rows($res);
	if($count == 1){
		$r = mysqli_fetch_assoc($res);
		$password = $r['password'];
		$to = $email;
		$subject = "Your Recovered Password";
		$message = "Please use this password to login " . $password;
		$headers = "From : fedor.grechnev@gmail.com";
		echo "<p style='background-color: #f44336; color:white; font-size: 24px; text-align: center;  padding: 70px 0; '>Your recovered password is <q>".$password."</p>";
	}else{
		echo "User email does not exist in database";
	}
}


?>