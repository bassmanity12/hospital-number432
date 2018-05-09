<?php
session_start();
require_once("databaseConnection.php");
$dbConn = new DatabaseConnection();
$pdo = $dbConn->getConnection();

// Check if any action was requested

if (isset($_GET['action']) && trim($_GET['action']) != '') {
    switch ($_GET['action']) {
        case 'modifyEvent':
            if (isset($_GET['event_id'])) {
                modifyEvent($_GET['event_id']);
            }
            break;

        default:
            break;
    }
} else {
    Header('Location: appointments.php');
    exit;
}

function modifyEvent($id) {
    $new_date= $_POST['date'];
    $new_time = $_POST['time'];
    if ($new_date){
        $sqlUPDATE = "UPDATE events SET date=:'date' WHERE id = '$id'";
    }
    else if ($new_time){
        $sqlUPDATE = "UPDATE events SET time=:'time' WHERE id = '$id'";
    }
    else{
        echo "<p>Oops! No changes were made.";
    }
    $sqlEDIT = "UPDATE events 
    SET time=:time doctor_id=:doctor_id allowed=:allowed 
    WHERE id=:id";
    $stmt = $pdo->prepare($sqlEDIT);
    $stmt->bindValue(":doctor_id", $doctor_id, PDO::PARAM_INT);
    $stmt->bindValue(":time", $date, PDO::PARAM_INT);
    $stmt->bindValue(":allowed", $allowed, PDO::PARAM_STR);
    $stmt->bindValue(":id", $id, PDO::PARAM_INT);
    $stmt->execute();
}
