<?php
session_start();
require_once("databaseConnection.php");
$dbConn = new DatabaseConnection();
$pdo = $dbConn->getConnection();

// Check if any action was requested

if (isset($_GET['action']) && trim($_GET['action']) != '') {
    switch ($_GET['action']) {
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
            break;
    }
} else {
    Header('Location: appointments.php');
    exit;
}

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