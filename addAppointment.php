<?php
    session_start();
    require_once("databaseConnection.php");
    $dbConn = new DatabaseConnection();
    $pdo = $dbConn->getConnection();
    
    if (isset($_SESSION['current_user']) && isset($_SESSION['current_user']['id'])) {
        // Right now we don't do anything
    } else {
        echo("<script>alert('Oops! Please log in to see the profile.')</script>");
        echo("<script>window.location = 'HTML/index.html';</script>");
        exit;
    }
    // Get the Appointment ID to pass into the Actions.php file
    if(isset($_GET['id'])){
        $patient_id = $_GET['id'];
        } else {
        echo "failed"; 
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>24/7 Doctor | Apply for Appointment</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="stylesheet" type="text/css" media="screen" href="../CSS/style.css" /> -->
    <link rel="stylesheet" type="text/css" media="screen" href="./CSS/style.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <!-- <div id="editpopup" class="modal" style="display:none;"> -->
        <form action="appointmentsPatientsActions.php?id=<?php echo $patient_id ?>&action=addEvent" method="POST" class="modal-content animate">
        <div class="imgcontainer">
        </div>
            <div class="container">
                <div><center><h1>Request an Appointment</h1></center></div>
                    <p><center> After requesting an appointment, your doctor will be alerted and process the appointment for approval:</p></center>
                <p>
                    <label>Propose Appointment Date:</label>
                    <input type="date" name="date" placeholder="Date"/>
                    <br>
                    <label>Propose Appointment Time:</label>
                    <input type="time" name="time" placeholder="Time"/>
                    <br>
                    <div class="form-group col-6">
                        <label for="sel1">Select Doctor from List:</label>
                            <select class="form-control" name="doctor">
                                <?php
                                    global $pdo;
                                    $sql = "SELECT fname, lname, id FROM patients WHERE type = 'Doctor'";
                                    $q = $pdo->query($sql);
                                    while ($r = $q->fetch()) {
                                        echo "<option value='{$r['id']}'>Dr. {$r['fname']} {$r['lname']}</option>";
                                    }
                                ?> 
                            </select>
                    </div>
                </p>
                <button type="submit" name="submit" value="Submit">Submit</button>
            </div>
        </form>
    <!-- </div> -->
    <script src="./JS/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>