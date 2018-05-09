<?php
  session_start();

arequire_once("dbConnection.php");

function rejectEvent($id){

    $sqlDELETE = "DELETE * FROM events WHERE id='$id'";
    $pdo->query($sqlDELETE); 
    echo'console.log("test")';
    /*echo("<script>alert('Great! The appointment has been rejected.')</script>");
    echo("<script>window.location = 'appointmentsDoctor.php';</script>");*/
    header('location: appointmentsDoctor.php');
    exit;
}

function approveEvent($id){

    $sqlAPPROVE = "UPDATE events SET allowed='Y' WHERE id=$id"; //when button is pressed, it assigns 1 to `allowed` and then
    $pdo->query($sqlAPPROVE);                                 //it will help in while-loop, which is show below
    echo("<script>alert('Great! The appointment has been approved.')</script>");
    echo("<script>window.location = 'appointmentsDoctor.php';</script>");
    exit;
}