?php
require_once("dbConnection.php");

function rejectEvent($id){

    $dbConn = new DatabaseConnection();
    $pdo = $dbConn->getConnection();

    $sqlDELETE = "DELETE * FROM events WHERE id=$id";
    $pdo->query($sqlDELETE); 
