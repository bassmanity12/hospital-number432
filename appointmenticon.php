<?php

function appticon(){
    $dates = mysql_query("SELECT 'date' FROM events");
    $num_rows = mysql_num_rows($dates);
    $dayCheck = mysql_query("SELECT DATE_FORMAT($date, '%Y-%d-%e') as starttime FROM events");
    for($num_rows = 0; $num_rows < 50; $num_rows++){
        echo('<img src="/img/appointment.png" class="appointmentIcon"></img>')
    }
}