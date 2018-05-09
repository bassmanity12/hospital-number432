<?php 
    session_start();
    
    if (isset($_SESSION['current_user']) && isset($_SESSION['current_user']['id'])) {
        // Right now we don't do anything
    } else {
        echo("<script>alert('Oops! Please log in to see the profile.')</script>");
        echo("<script>window.location = 'HTML/index.html';</script>");
        exit;
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>24/7 Doctor | Appointments - Patient</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="stylesheet" type="text/css" media="screen" href="../CSS/style.css" /> -->
    <link rel="stylesheet" type="text/css" media="screen" href="./CSS/style.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  </head>  
<body>
    <div id="navbar" class="navbarMain">
        <ul>
            <li><a class="active" href="./HTML/index.html">Home</a></li>
            <li><a href="./HTML/about.html">About</a></li>
            <li><a href="./HTML/faq.html">FAQ</a></li>
            <li><a href="./HTML/contact.html">Contact</a></li>
        </ul>
    </div>
    <div class="wrapper">
        <main>
        <div class="toolbar">
            <div class="col-md-6 current-month">May 2018</div>
                <div class="col-md-6" style="text-align: right" > <a href="logout.php">Logout</a></div>
            </div>
<<<<<<< HEAD
            <?php
            if (isset($_SESSION['message']) && trim($_SESSION['message']) != '') {
                echo "<div class='alert alert-primary'>{$_SESSION['message']}</div>";
                $_SESSION['message'] = '';
            }
            ?>
=======
>>>>>>> 4df0df0e2ef74e871c1b622b4406504d84387410
            <div class="calendar">
                <div class="table100 ver2 m-b-110">
                    <div class="table100-head">
                        <table>
                            <thead>
                            <tr class="row100 head">
                                <th class="cell100 column1">Appointment ID</th>
                                <th class="cell100 column2">Date</th>
                                <th class="cell100 column3">Time</th>
                                <th class="cell100 column4">Doctor ID</th>
<<<<<<< HEAD
                                <th class="cell100 column5">Confirmed?</th>
                                <th class="cell100 column6"></th>
=======
<<<<<<< HEAD
                                <th class="cell100 column5">Confirmed?</th>
                                <th class="cell100 column6"></th>
=======
                                <th class="cell100 column5"></th>
>>>>>>> f4799bbeda5a36f0fc92badf737178f8bc06e9e5
>>>>>>> 4df0df0e2ef74e871c1b622b4406504d84387410
                            </tr>
                            </thead>
                        </table>
                    </div>
                    <div class="table100-body js-pscroll">
                        <table>
                            <tbody>
                                <?php
                                    require_once("databaseConnection.php");
                                    $dbConn = new DatabaseConnection();
                                    $pdo = $dbConn->getConnection();

                                    $sql = "SELECT * FROM events WHERE patient_id = " . $_SESSION['current_user']['id'];
                                    $q = $pdo->query($sql);
                                    $q->setFetchMode(PDO::FETCH_ASSOC);

                                    while ($r = $q->fetch()) {
                                        echo "<tr class='row100 body'>";
                                            echo "<td class='cell100 column1'>" . $r['id'] . "</td>";
                                            echo "<td class='cell100 column2'>" . $r['date'] . "</td>";
                                            echo "<td class='cell100 column3'>" . $r['time'] . "</td>";
                                            echo "<td class='cell100 column4'>" . $r['doctor_id'] . "</td>";
<<<<<<< HEAD
                                            echo "<td class='cell100 column5'>" . $r['allowed'] . "</td>";
                                            echo "<td class='cell100 column6'>";
                                               // echo "<button class='popUp btn btn-outline-secondary' id='edit' onclick='showeditpopup()'>Modify</button>";
                                               echo "<a class='popUp btn btn-outline-secondary' id='edit' href='./edit.php?event_id={$r['id']}'>Modify</a>";
=======
<<<<<<< HEAD
                                            echo "<td class='cell100 column5'>" . $r['allowed'] . "</td>";
                                            echo "<td class='cell100 column6'>";
                                               // echo "<button class='popUp btn btn-outline-secondary' id='edit' onclick='showeditpopup()'>Modify</button>";
                                               echo "<a class='popUp btn btn-outline-secondary' id='edit' href='./edit.php'>Modify</a>";
=======
                                            echo "<td class='cell100 column5'>";
                                                    echo "<center><a href='editAppointment.php' class='btn btn-outline-secondary'>Modify</a></center>";
>>>>>>> f4799bbeda5a36f0fc92badf737178f8bc06e9e5
>>>>>>> 4df0df0e2ef74e871c1b622b4406504d84387410
                                            echo "</td>";
                                        echo "</tr>";
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
<<<<<<< HEAD
            </div>
            <!-- end .calendar -->
=======
            </div><!-- end .calendar -->
<<<<<<< HEAD
            <!-- <div id="editpopup" class="modal" style="display:none;">
                <form action="./editEvent.php" method="POST" class="modal-content animate">
                    <div class="imgcontainer">
                        <span onclick="hideeditpopup()" class="close" title="Close Modal">&times;</span>
                    </div>
                    <div class="container">
                        <label>Doctors id:</label>
                        <input type="number" name="doctor_id" />
                        <label>Date:</label>
                        <input type="date" name="date" />
                        <button type="submit" name="submit" value="Submit">Submit</button>
                    </div>
                </form>
            </div> --> 
=======
>>>>>>> f4799bbeda5a36f0fc92badf737178f8bc06e9e5
>>>>>>> 4df0df0e2ef74e871c1b622b4406504d84387410
        </main>
        <sidebar>
            <div class="logo">WELCOME</div>
            <div class="avatar">
            <div class="avatar__img">
                <img src="./img/calendar.png" alt="avatar">
                <center>
                    <?php echo $_SESSION['current_user']['fname']." ".$_SESSION['current_user']['lname'];?>
                </center>
            </div>
            <!--<div class="avatar__name">John Smith</div> -->
            </div>
            <nav class="menu">
            <a class="menu__item" href="profile.php">
                <i class="menu__icon fa fa-envelope"></i>
                <span class="menu__text">PROFILE</span>
            </a>
            <?php
                if ($_SESSION['current_user']['type'] == 'Doctor') {
                    echo "<a href='appointmentsDoctor.php' class='menu__item menu__item--active'><i class='menu__icon fa fa-list'></i><span class='menu__text'>APPOINTMENTS</span></a>";
                }
                else {
                    echo "<a href='appointments.php' class='menu__item menu__item--active'><i class='menu__icon fa fa-list'></i><span class='menu__text'>APPOINTMENTS</span></a>";
                }
           ?>
            <a class="menu__item menu__item" href="calendar.php">
                <i class="menu__icon fa fa-calendar"></i>
                <span class="menu__text">CALENDAR</span>
            </a>
            </nav>
        </sidebar>
    </div>
    <div id="footer" class="navbarMain">
        <ul style="float:left"></ul>
        <li class="copyright">Copyright (c) 2018 Medical Booking Inc.</li>
        <ul style="float: right">
            <li><button class="buttonFooter" data-container="body" data-toggle="popover"  data-trigger="hover" data-placement="top"
                data-content="Subject to the express provisions of this notice:
                (a)	we, together with our licensors, own and control all the copyright and other intellectual property rights in our website and the material on our website; and
                (b)	all the copyright and other intellectual property rights in our website and the material on our website are reserved."
                >Copyright Policy</button></li>
            <li><button class="buttonFooter" data-container="body" data-toggle="popover"  data-trigger="hover" data-placement="top"
                data-content="Our website contains general medical information. The medical information is not advice and should not be treated as such.">Disclaimer</button></li>
        </ul>
    </div>
    <script src="./JS/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>