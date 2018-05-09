<?php
    session_start();
    
    if (isset($_SESSION['current_user']) && isset($_SESSION['current_user']['id'])) {
        // Right now we don't do anything
    } else {
        echo("<script>alert('Oops! Please log in to see the profile.')</script>");
        echo("<script>window.location = 'HTML/index.html';</script>");
        exit;
    }
<<<<<<< HEAD
    // Get the Appointment ID to pass into the Actions.php file
    $event_id = $_GET['event_id'];
=======

>>>>>>> 4df0df0e2ef74e871c1b622b4406504d84387410
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>24/7 Doctor | Appointments - Doctor</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="stylesheet" type="text/css" media="screen" href="../CSS/style.css" /> -->
    <link rel="stylesheet" type="text/css" media="screen" href="./CSS/style.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <!-- <div id="editpopup" class="modal" style="display:none;"> -->
<<<<<<< HEAD
        <form action="appointmentsPatientsActions.php?event_id=$event_id&action=modifyEvent" method="POST" class="modal-content animate">
=======
        <form action="./appointmentsPatientsActions.php?event_id={$r['id']}&action=modifyEvent" method="POST" class="modal-content animate">
>>>>>>> 4df0df0e2ef74e871c1b622b4406504d84387410
            <div class="imgcontainer">
                <span onclick="hideeditpopup()" class="close" title="Close Modal">&times;</span>
            </div>
            <div class="container">
<<<<<<< HEAD
                <?php
                    // echo "<p><strong>Current Appointment Information:</strong>" . $_SESSION['current_user']['date'] . "at" . $_SESSION['current_user']['time'] "</p><br>"; -->
                ?>
                <div><center><h1>Modify Your Appointment</h1></center></div>
=======
                <?
                    // echo "<p><strong>Current Appointment Information:</strong>" . $r['date'] . "at" . $r['time']"</p><br>";
                ?>
>>>>>>> 4df0df0e2ef74e871c1b622b4406504d84387410
                <p>
                    <label>Propose New Appointment Date:</label>
                    <input type="date" name="date" placeholder="Date"/>
                    <br>
                    <label>Propose New Appointment Time:</label>
                    <input type="time" name="time" placeholder="Time"/>
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