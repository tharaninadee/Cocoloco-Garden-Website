<?php
// Include your configuration file
require("conf.php");

// Start the session
session_start();

// Check if the admin is not logged in, redirect to the login page
if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'admin') {
    header("Location: ../Home/logindayout.php");
    exit();
}

// Rest of your code for the admin view page goes here

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Gallery:Admin</title>
    <link href="../Assest/styletable.css" rel="stylesheet">
</head>

<style>


.custom-table {
    border-collapse: collapse;
    width: 80%;
}

.custom-table td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: center;
}


.top{
    font-family: 'Calibri';
    font-size: 22px;
    color:Green;
    font-weight:bold;
    
}
    </style>
<body>
<?php include("navbonlyadmin.php") ?>
<br><br><br>
    <div class="topic"><img class="coco" width="80" height="50" style="margin-right:100px; margin-bottom:10px; margin-left:30px;" role="img" src="../Image/loco.png"> Add Cocoloco Package</div>

    <br><br><br>
<center><table class="custom-table"></center>
<td colspan="3">
<div class="top"> Add Package Details <div>
</tr>
    <tr>
        <td>
        <a href="DayoutPacAdmin.php" class="btn btn-brown" style= "background-color:#8B4513; color: #fff; width:200px;">Day Out Package</a>
        </td>
        <td>
        <a href="photoshootadmin.php" class="btn btn-brown" style= "background-color:#8B4513; color: #fff; width:200px;">Photo Shoot Package</a>
        </td>
        <td>
        <a href="roomadmin.php" class="btn btn-brown" style= "background-color:#8B4513; color: #fff; width:200px;">Room Package</a>
        </td>
    </tr>

    <td colspan="3">
<div class="top"> Add Buffet Details<div>
</tr>
    <tr>
        <td>
        <a href="Buffetadmin.php" class="btn btn-brown" style= "background-color:#8B4513; color: #fff; width:200px;">Buffet Package</a>
        </td>
        
    </tr>

    
</table>


</body>
</html>
