<?php
function build_calendar($month,$year) {

    $daysOfWeek = array('S','M','T','W','T','F','S');
    $firstDayOfMonth = mktime(0,0,0,$month,1,$year);
    $numberDays = date('t',$firstDayOfMonth);
    $dateComponents = getdate($firstDayOfMonth);
    $monthName = $dateComponents['month'];
    $dayOfWeek = $dateComponents['wday'];

    // Table tag opener and day headers

    $calendar = "<table class='calendar'>";
    $calendar .= "<caption>$monthName $year</caption>";
    $calendar .= "<tr>";

    // Create the calendar headers

    foreach($daysOfWeek as $day) {
         $calendar .= "<th class='header'>$day</th>";
    } 

    $currentDay = 1;

    $calendar .= "</tr><tr>";

    if ($dayOfWeek > 0) { 
         $calendar .= "<td colspan='$dayOfWeek'>&nbsp;</td>"; 
    }
    
    $month = str_pad($month, 2, "0", STR_PAD_LEFT);
 
    while ($currentDay <= $numberDays) {


         if ($dayOfWeek == 7) {

              $dayOfWeek = 0;
              $calendar .= "</tr><tr>";

         }
         
         $currentDayRel = str_pad($currentDay, 2, "0", STR_PAD_LEFT);
         
         $date = "$year-$month-$currentDayRel";

         $calendar .= "<td class='day' rel='$date'><button>$currentDay</button></td>";


         $currentDay++;
         $dayOfWeek++;

    }


    if ($dayOfWeek != 7) { 
    
         $remainingDays = 7 - $dayOfWeek;
         $calendar .= "<td colspan='$remainingDays'>&nbsp;</td>"; 

    }
    
    $calendar .= "</tr>";

    $calendar .= "</table>";

    return $calendar;

}


     $dateComponents = getdate();

     $month = $dateComponents['mon']; 			     
     $year = $dateComponents['year'];
?>
<!DOCTYPE HTML>
<html>
    <head>
        <link rel="stylesheet" href="style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    </head>
    <body>
        <div id="calendar">
            <?php echo build_calendar($month,$year); ?>
            <div id="eventsInfo">

            </div>
        </div>
    </body>
</html>