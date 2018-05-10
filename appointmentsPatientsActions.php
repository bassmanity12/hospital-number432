<?php
session_start();
require_once("databaseConnection.php");
$dbConn = new DatabaseConnection();
$pdo = $dbConn->getConnection();
var_dump($_GET['id']);
if (isset($_GET['action']) && trim($_GET['action']) != '') {
    switch ($_GET['action']) {
        case 'modifyEvent':
            if (isset($_GET['event_id'])) {
                modifyEvent($_GET['event_id']);
            }
            break;

        case 'addEvent':
            if (isset($_GET['id'])) {
                addEvent($_GET['id']);
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
    $sqlUPDATE = "UPDATE events SET date = '{$new_date}', time = '{$new_time}', allowed = 'N' WHERE id = '{$id}'";
    $pdo->query($sqlUPDATE);
    $_SESSION['message'] = "Appointment #{$id} has been updated. Waiting for approval.";
    header('location: appointments.php');
    exit;
}

function addEvent($id) {
    global $pdo;
    $new_date= $_POST['date'];
    $new_time = $_POST['time'];
    $sqlUPDATE = "INSERT INTO events (date, time, patient_id, doctor_id, allowed) VALUES ('{$new_date}', '{$new_time}','{$id}','81', 'N')";
    $pdo->query($sqlUPDATE);
    $_SESSION['message'] = "Appointment #{$id} has been requested. Waiting for approval.";
    header('location: appointments.php');
    exit;
}
/* date = $new_date,
time = $new_time,
allowed = 'N'
WHERE
id = '$id'"; */