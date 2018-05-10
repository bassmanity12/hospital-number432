<?php
session_start();
require_once("databaseConnection.php");
$dbConn = new DatabaseConnection();
$pdo = $dbConn->getConnection();
var_dump($_GET['profile_id']);
$id = $_GET['profile_id'];
var_dump($id);
exit;

/*if (isset($_GET['action']) && trim($_GET['action']) != '') {
    switch ($_GET['action']) {
        case 'updateProfile':
                updateProfile($$_GET['profile_id']);
            }
			break;
		} else {
    		Header('Location: profile.php');
    		exit;
		}
/**
           * This is the function that handles the edit of profile
           */
	function updateProfile($id) {
		$postedData = $_POST['data'];
		$email = $postedData['email'];
		$firstname = $postedData['fname'];
		$lastname = $postedData['lname'];
		$age = $postedData['age'];
		$gender = $postedData['gender'];
		$password = $postedData['password'];

		var_dump($id);
		$params = [
			':fname' => $firstname,
			':lname' => $lastname,
			':email' => $email,
			':gender' => $gender,
			':age' => $age,
			':password' => $password,
		];
			
			try {
				$statement = $pdo->prepare(
					"UPDATE `patients` SET fname = :fname, lname = :lname, email = :email,
								age = :age, gender = :gender, password = :password
								WHERE id = '$id'"
				);
		
				$statement->execute($params);
		
				$_SESSION['message'] = "Your profile has been updated!";
				header('location: profile.php');
				return;
			} catch (PDOException $e) {
				var_dump($e->getMessage());
				die();
			}
	}
	// call to the update function
	updateProfile($id);