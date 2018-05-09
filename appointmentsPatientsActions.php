<?php
session_start();
require_once("databaseConnection.php");
$dbConn = new DatabaseConnection();
$pdo = $dbConn->getConnection();

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
    global $pdo;
    $new_date= $_POST['date'];
    $new_time = $_POST['time'];
    $old_date = $pdo->query("SELECT date FROM events WHERE id = '$id'");
    $old_time = $pdo->query("SELECT time FROM events WHERE id = '$id'");

    // If the date has been changed, disapprove appointment and update date.
    if ($new_date != $old_date){ 
        $sqlUPDATEdate = "UPDATE events SET date=$new_date WHERE id = '$id'";
        $sqlUPDATEtime = "UPDATE events SET allowed='N' WHERE id = '$id'";
        $pdo->query($sqlUPDATEdate);
        $pdo->query($sqlUPDATEtime);
        if ($pdo->query($sqlUPDATEdate) === TRUE) {
            $_SESSION['message'] = "Appointment #{$id} date has been updated. Waiting for approval.";
            header('location: appointments.php');
        } else {
            echo "error1";
        }
    }
    else{
        exit;
    }
}
    /*
    else if ($new_time != $old_time){ // If the time has been changed, disapprove appointment and update time.
        $sqlUPDATE = "UPDATE events SET time=$new_time WHERE id = '$id'";
        $sqlUPDATE = "UPDATE events SET allowed='N' WHERE id = '$id'";
        $_SESSION['message'] = "Appointment #{$id} time has been updated. Waiting for approval.";
        header('location: appointments.php');
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
    $stmt->execute();*/

