<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>24/7 Doctor | Calendar</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../CSS/style.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  </head>  
<body>
<div id="navbar" class="navbarMain">
<ul>
    <li><a class="active" href="index.html">Home</a></li>
    <li><a href="about.html">About</a></li>
    <li><a href="faq.html">FAQ</a></li>
    <li><a href="contact.html">Contact</a></li>
</ul>
</div>
<div class="wrapper">
  <main>
    <div class="toolbar">
      <div class="current-month">May 2018</div>
    </div>
      <div class="calendar">
          <?php
          require_once("dbConnection.php");
          
          function showEvent(){
          
              $final_event = "<div>";
          
              $dbConn = new DatabaseConnection();
              $pdo = $dbConn->getConnection();
          
              $sql = 'SELECT * FROM events WHERE patient_id = 1';// here, instead of 1 should be id of user who is present on the page now
              $q = $pdo->query($sql);
          
              echo "<table>";
          
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
      </div>
 </div>
  </main>
  <sidebar>
    <div class="logo">WELCOME</div>
    <div class="avatar">
      <div class="avatar__img">
        <img src="../img/calendar.png" alt="avatar">
      </div>
      <!--<div class="avatar__name">John Smith</div> -->
    </div>
    <nav class="menu">
      <a class="menu__item" href="calendar.html">
        <i class="menu__icon fa fa-home"></i>
        <span class="menu__text">OVERVIEW</span>
      </a>
      <a class="menu__item" href="profile.html">
        <i class="menu__icon fa fa-envelope"></i>
        <span class="menu__text">PROFILE</span>
      </a>
      <a class="menu__item menu__item--active" href="appointments.html">
        <i class="menu__icon fa fa-list"></i>
        <span class="menu__text">APPOINTMENTS</span>
      </a>
      <a class="menu__item menu__item" href="calendar.html">
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
<script src="../JS/script.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>