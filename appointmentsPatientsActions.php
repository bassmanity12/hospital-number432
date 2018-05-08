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

function rejectEvent($id) {
    global $pdo;
    $sqlUPDATE = "UPDATE events SET allowed='N' WHERE id = '$id'";
    $pdo->query($sqlUPDATE); 
    $_SESSION['message'] = "Appointment #{$id} has been rejected.";
    header('location: appointments.php');
    exit;
}

function approveEvent($id) {
    global $pdo;
    $sqlUPDATE = "UPDATE events SET allowed='Y' WHERE id = '$id'";
    $pdo->query($sqlUPDATE);
    $_SESSION['message'] = "Appointment #{$id} has been approved.";
    header('location: appointments.php');
    exit;
}