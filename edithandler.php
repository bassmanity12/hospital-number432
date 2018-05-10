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
		
		$id2 = $_POST['id'];
		$email = $_POST['email'];
		$firstname = $_POST['fname'];
		$lastname = $_POST['lname'];
		$age = $_POST['age'];
		$gender = $_POST['gender'];
		$password = $_POST['password'];
		echo $firstname;
		echo $lastname;
		echo $email;
		echo $id2;
		echo $age;
		echo $password;

		var_dump($email);
//		var_dump($id);
//		$params = [
//			':fname' => $firstname,
//			':lname' => $lastname,
//			':email' => $email,
//			':gender' => $gender,
//			':age' => $age,
//			':password' => $password,
//		];
//
			
//$sql = "UPDATE `patients` SET fname = :fname, lname = :lname, email = :email,
//								age = :age, gender = :gender, password = :password
//								WHERE id = '$id2'";
//$sql = "UPDATE `patients` SET fname ='$firstname', lname = '$lastname', email = '$email',
//								age = $age, gender = '$gender' password = '$password'
//								WHERE id = $id2";

$sql = "UPDATE patients SET fname='$firstname', lname='$lastname' WHERE id=$id2";


if (mysqli_query($connection, $sql)) {
    echo "Record updated successfully, Your profile would be updated next time you log in";
    header("Location: profile.php");
} else {
    echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>