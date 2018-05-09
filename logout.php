<?php
session_start();
    $_SESSION['current_user'] = false;
    echo("<script>alert('You are being logged out...')</script>");
    echo("<script>window.location = 'HTML/index.html';</script>");

    // header('Location: HTML/index.html');
    exit;