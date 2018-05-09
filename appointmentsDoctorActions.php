<?php
session_start();
require_once("databaseConnection.php");
$dbConn = new DatabaseConnection();
$pdo = $dbConn->getConnection();

// Check if any action was requested

if (isset($_GET['action']) && trim($_GET['action']) != '') {
    switch ($_GET['action']) {
        case 'rejectEvent':
            if (isset($_GET['event_id'])) {
                rejectEvent($_GET['event_id']);
            }
            break;

        case 'approveEvent':
            if (isset($_GET['event_id'])) {
                approveEvent($_GET['event_id']);
            }
            break;
        
        default:
            break;
    }
} else {
    Header('Location: appointmentsDoctor.php');
    exit;
}

function rejectEvent($id) {
    global $pdo;
    $sqlUPDATE = "UPDATE events SET allowed='N' WHERE id = '$id'";
    $pdo->query($sqlUPDATE); 
    $_SESSION['message'] = "Appointment #{$id} has been rejected.";
    header('location: appointmentsDoctor.php');
    exit;
}

function approveEvent($id) {
    global $pdo;
    $sqlUPDATE = "UPDATE events SET allowed='Y' WHERE id = '$id'";
    $pdo->query($sqlUPDATE);
    $_SESSION['message'] = "Appointment #{$id} has been approved.";
    header('location: appointmentsDoctor.php');
    exit;
}