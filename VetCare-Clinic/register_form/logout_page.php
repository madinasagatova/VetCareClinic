<?php
@include 'config.php'; //connecting to the DB
//log out from website
session_start();
session_unset();
session_destroy();
header('location: ../index.html'); // goes to the home page if loged out
?>