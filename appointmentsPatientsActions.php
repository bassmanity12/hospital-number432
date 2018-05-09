<?php
session_start();
require_once("databaseConnection.php");
$dbConn = new DatabaseConnection();
$pdo = $dbConn->getConnection();

// Check if any action was requested

if (isset($_GET['action']) && trim($_GET['action']) != '') {
    switch ($_GET['action']) {
<<<<<<< HEAD
        case 'modifyEvent':
            if (isset($_GET['event_id'])) {
                modifyEvent($_GET['event_id']);
            }
            break;

        default:
=======
        case 'modifyEventTime':
            if (isset($_GET['event_id'])) {
                modifyEventTime($_GET['event_id']);
            }
            break;

        case 'modifyEventTime':
            if (isset($_GET['event_id'])) {
                modifyEventDate($_GET['event_id']);
            }
            break;
            default:
>>>>>>> f4799bbeda5a36f0fc92badf737178f8bc06e9e5
            break;
    }
} else {
    Header('Location: appointments.php');
    exit;
}

<<<<<<< HEAD
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
=======
function modifyEventTime($id) {
    global $pdo;
    $sqlUPDATE = "UPDATE events SET time='$_POST['new_time']' WHERE id = '$id'";
    $pdo->query($sqlUPDATE); 
    $_SESSION['message'] = "Appointment #{$id} has been rejected.";
    header('location: appointments.php');
    exit;
}

function modifyEventDate($id) {
    global $pdo;
    $sqlUPDATE = "UPDATE events SET allowed='Y' WHERE id = '$id'";
    $pdo->query($sqlUPDATE);
    $_SESSION['message'] = "Appointment #{$id} has been approved.";
    header('location: appointments.php');
    exit;
}
>>>>>>> f4799bbeda5a36f0fc92badf737178f8bc06e9e5
