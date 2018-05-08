<?php 
  session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>24/7 Doctor | Profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="./CSS/style.css" />
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
<!--      showing and hiding-->
    <div class="toolbar">
      <div class="current-month">May 2018</div>
    </div>
    <div class="calendar">
        <div class="container">
            <div class="row">
            <div class="col-md-5  toppad  pull-right col-md-offset-3">
              <a href="logout.php" >Logout</a>
             <br>
            </div>
              <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
                <div class="panel panel-info">
                  <div class="panel-heading">
                      <h4>
                          <?php
                            include "dbcheck.php";
                            echo $_SESSION['current_user']['fname']." ".$_SESSION['current_user']['lname'];
                          ?>
                      </h4>
                  </div>
                  <div class="panel-body">
                    <div class="row">
                      <div class="col-md-3 col-lg-3 " align="center">
                        <img alt="User Pic" src="img/default%20user%20icon.png" class="user-image"> </div>
                      <div class=" col-md-9 col-lg-9 ">
                        <table class="table table-user-information">
                          <tbody>
                                <tr>
                                <td>ID</td>
                                <td><?php echo $_SESSION['current_user']['id']; ?></td>
                                    <br>
                                </tr>
                                <tr>
                                    <br>
                                <td>Age</td>
                                <td><?php echo $_SESSION['current_user']['age']; ?>
                                    <br>
                                </td>
                                    <br>
                                </tr>
                                <tr>
                                <td>Gender</td>
                                <td><?php echo $_SESSION['current_user']['gender']; ?>
                                </td>
                                    <br>
                                </tr>
                                <tr>
                                <td>Email</td>
                                <td><?php echo $_SESSION['current_user']['email']; ?></td>
                                </tr>
                                <tr>
                                <td>Account Type</td>
                                <td><?php echo $_SESSION['current_user']['type']; ?></td>
                                </tr>
                          </tbody>
                        </table>
                      </div>
                      <div>
                            <?php
                                if ($_SESSION['current_user']['type'] == 'Doctor') {
                                    echo "<a href='appointmentsDoctor.php' class='btn btn-primary'>Manage Your Appointments</a>";
                                }
                                else {
                                    echo "<a href='appointments.php' class='btn btn-primary'>Manage Your Appointments</a>";
                                }
                            ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
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
          <a class="menu__item menu__item--active" href="profile.php">
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
