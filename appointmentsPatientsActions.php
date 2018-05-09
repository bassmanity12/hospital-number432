<?php
session_start();
require_once("databaseConnection.php");
$dbConn = new DatabaseConnection();
$pdo = $dbConn->getConnection();

// Check if any action was requested

<<<<<<< HEAD
/*$event_id = $_GET['event_id'];
var_dump($event_id);
var_dump($_GET['event_id']);
exit;*/

if (isset($_GET['action']) && trim($_GET['action']) != '') {
    switch ($_GET['action']) {
=======
if (isset($_GET['action']) && trim($_GET['action']) != '') {
    switch ($_GET['action']) {
<<<<<<< HEAD
>>>>>>> 4df0df0e2ef74e871c1b622b4406504d84387410
        case 'modifyEvent':
            if (isset($_GET['event_id'])) {
                modifyEvent($_GET['event_id']);
            }
            break;

        default:
<<<<<<< HEAD
=======
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
>>>>>>> 4df0df0e2ef74e871c1b622b4406504d84387410
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
    $old_date = "SELECT date FROM events WHERE id = '$id'";
        var_dump($old_date);
    $old_time = "SELECT time FROM events WHERE id = '$id'";
        var_dump($old_time);

    if ($new_date != $old_date){ // If the date has been changed, disapprove appointment and update date.
        $sqlUPDATE = "UPDATE events SET date=$new_date WHERE id = '$id'";
        $sqlUPDATE = "UPDATE events SET allowed='N' WHERE id = '$id'";
        $_SESSION['message'] = "Appointment #{$id} date has been updated. Waiting for approval.";
        header('location: appointmentsDoctor.php');
    }
    else if ($new_time != $old_time){ // If the time has been changed, disapprove appointment and update time.
        $sqlUPDATE = "UPDATE events SET time=$new_time WHERE id = '$id'";
        $sqlUPDATE = "UPDATE events SET allowed='N' WHERE id = '$id'";
        $_SESSION['message'] = "Appointment #{$id} time has been updated. Waiting for approval.";
        header('location: appointmentsDoctor.php');
=======
<<<<<<< HEAD
function modifyEvent($id) {
    $new_date= $_POST['date'];
    $new_time = $_POST['time'];
    if ($new_date){
        $sqlUPDATE = "UPDATE events SET date=:'date' WHERE id = '$id'";
    }
    else if ($new_time){
        $sqlUPDATE = "UPDATE events SET time=:'time' WHERE id = '$id'";
>>>>>>> 4df0df0e2ef74e871c1b622b4406504d84387410
    }
    else{
        echo "<p>Oops! No changes were made.";
    }
<<<<<<< HEAD
    /*$sqlEDIT = "UPDATE events 
=======
    $sqlEDIT = "UPDATE events 
>>>>>>> 4df0df0e2ef74e871c1b622b4406504d84387410
    SET time=:time doctor_id=:doctor_id allowed=:allowed 
    WHERE id=:id";
    $stmt = $pdo->prepare($sqlEDIT);
    $stmt->bindValue(":doctor_id", $doctor_id, PDO::PARAM_INT);
    $stmt->bindValue(":time", $date, PDO::PARAM_INT);
    $stmt->bindValue(":allowed", $allowed, PDO::PARAM_STR);
    $stmt->bindValue(":id", $id, PDO::PARAM_INT);
<<<<<<< HEAD
    $stmt->execute();*/
}
=======
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
>>>>>>> 4df0df0e2ef74e871c1b622b4406504d84387410
