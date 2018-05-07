
<?php
/**
 * Created by PhpStorm.
 * User: b
 * Date: 04.05.2018
 * Time: 17:18
 */
$servername = "ec2-18-197-115-58.eu-central-1.compute.amazonaws.com";
$username = "group_4_user";
$pass = "MJkdJqyrXwZGKUxT";
$dbname = "group_4_user_medical";

$conn = mysqli_connect($servername, $username, $pass, $dbname);

// Check connection

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$email = $_POST['email'];
$sql = "SELECT * FROM patients WHERE email ='as'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
//    echo "<table><tr><th>ID</th><th>Name</th></tr>";
//    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "$row[fname]"." "."$row[lname]" ;
    }
    echo "</table>";
} else {
    echo "0 results";
}
$conn->close();
?>
