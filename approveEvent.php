<?php
function approveEvent($id){

    $dbConn = new DatabaseConnection();
    $pdo = $dbConn->getConnection();

    $sqlAPPROVE = "UPDATE events SET allowed=1 WHERE id=$id"; //when button is pressed, it assigns 1 to `allowed` and then
    $pdo->query($sqlAPPROVE);                                 //it will help in while-loop, which is show below

}
