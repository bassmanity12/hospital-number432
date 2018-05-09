<?php
  session_start();

  //require_once("dbConnection.php");
  
function approveEvent($id){

    $dbConn = new DatabaseConnection();
    $pdo = $dbConn->getConnection();

    $sqlAPPROVE = "UPDATE events SET allowed='Y' WHERE id=$id"; //when button is pressed, it assigns 1 to `allowed` and then
    $pdo->query($sqlAPPROVE);                                 //it will help in while-loop, which is show below
    echo("<script>alert('Great! The appointment has been approved.')</script>");
    echo("<script>window.location = 'appointmentsDoctor.php';</script>");
    exit;
}
