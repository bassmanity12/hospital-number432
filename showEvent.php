<?php
require_once("dbConnection.php");

function showEvent(){

    $final_event = "<div>";

    $dbConn = new DatabaseConnection();
    $pdo = $dbConn->getConnection();

    $sql = 'SELECT * FROM events WHERE patient_id = 1';// here, instead of 1 should be id of user who is present on the page now
    $q = $pdo->query($sql);

    echo "<table class="table100 ver2 m-b-110">";

    $q->setFetchMode(PDO::FETCH_ASSOC);
    while ($r = $q->fetch()) {
        echo sprintf('Appointment id: %s "<tr><td>" Date: %s "<tr><td>" Doctor\'s id: %s <br/>', $r['id'], $r['date'], $r['doctor_id']);

    echo "</table>";
    }
}

showEvent();//It will redirect to  a new page where the created div will be shown. 
            //I didn't manage to make it the way that it outputs on the same page, but will work on it later on

?>

<div id="show_event"></div>