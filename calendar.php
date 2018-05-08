<?php 
    session_start();
    
    if (isset($_SESSION['current_user']) && isset($_SESSION['current_user']['id'])) {
        // Right now we don't do anything
    } else {
        echo("<script>alert('Oops! Please log in to see the profile.')</script>");
        echo("<script>window.location = 'HTML/index.html';</script>");
        exit;
    }

    function build_calendar($month,$year) {

        $daysOfWeek = array('S','M','T','W','T','F','S');
        $firstDayOfMonth = mktime(0,0,0,$month,1,$year);
        $numberDays = date('t',$firstDayOfMonth);
        $dateComponents = getdate($firstDayOfMonth);
        $monthName = $dateComponents['month'];
        $dayOfWeek = $dateComponents['wday'];

        // Table tag opener and day headers

        $calendar = "<table class='calendar'>";
        $calendar .= "<tr class='calendar__week'>";
        $currentDay = 1;
        $calendar .= "</tr><tr class='calendar__week'>";
        if ($dayOfWeek > 0) { 
            $calendar .= "<td colspan='$dayOfWeek' class='calendar__day day'>&nbsp;</td>"; 
        }
        
        $month = str_pad($month, 2, "0", STR_PAD_LEFT);
    
        while ($currentDay <= $numberDays) {
            if ($dayOfWeek == 7) {
                  $dayOfWeek = 0;
                  $calendar .= "</tr><tr class='calendar__week'>";
            }
            $currentDayRel = str_pad($currentDay, 2, "0", STR_PAD_LEFT);
            $date = "$year-$month-$currentDayRel";
            $calendar .= "<td class='calendar__day day' rel='$date'>$currentDay</td>";
            $currentDay++;
            $dayOfWeek++;
        }
        if ($dayOfWeek != 7) { 
            $remainingDays = 7 - $dayOfWeek;
            $calendar .= "<td class='calendar__day day' colspan='$remainingDays'>&nbsp;</td>"; 
        }
        $calendar .= "</tr>";
        $calendar .= "</table>";
        return $calendar;
    }
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>24/7 Doctor | Calendar</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">    
        <link rel="stylesheet" type="text/css" media="screen" href="./CSS/style.css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
            <div class="current-month">May 2018</div>
        </div>
        <div class="calendar">
            <div class="calendar__header">
                <div>sun</div>
                <div>mon</div>
                <div>tue</div>
                <div>wed</div>
                <div>thur</div>
                <div>fri</div>
                <div>sat</div>
            </div>
            <div>
                <?php
                      $dateComponents = getdate();
                      $month = $dateComponents['mon']; 			     
                      $year = $dateComponents['year'];  
                      echo build_calendar($month,$year);
                ?>
            </div>
        </div>
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
            </div>
        <nav class="menu">
            <a class="menu__item" href="profile.php">
                <i class="menu__icon fa fa-envelope"></i>
                <span class="menu__text">PROFILE</span>
            </a>
            <?php
                if ($_SESSION['current_user']['type'] == 'Doctor') {
                    echo "<a href='appointmentsDoctor.php' class='menu__item'><i class='menu__icon fa fa-list'></i><span class='menu__text'>APPOINTMENTS</span></a>";
                }
                else {
                    echo "<a href='appointments.php' class='menu__item'><i class='menu__icon fa fa-list'></i><span class='menu__text'>APPOINTMENTS</span></a>";
                }
            ?>
            <a class="menu__item menu__item--active" href="calendar.php">
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