<?php
session_start();
$_SESSION['loggedin'] = false;
session_destroy();
$uname = $_SESSION['Username'];
$uname = $_SESSION['Fname'];
$uname = $_SESSION['Lname'];
$uname = $_SESSION['aRole'];
header("Location:../index.php");
?>