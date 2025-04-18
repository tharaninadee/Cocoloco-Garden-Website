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


<!doctype html>
<html lang="en" data-bs-theme="auto">

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Cocoloco : Admin Dashboard</title>

<link href="../Assest/bootstrap.min.css" rel="stylesheet">
<link href="../Assest/styletable.css" rel="stylesheet">


</head>

<body class="">

<?php include ("navbonlyadmin.php") ?>
<br>
<br><br>
<div class="topic"><img class="coco" width="80" height="50" style="margin-right:100px; margin-bottom:30px; margin-left:30px;" role="img" src="../Image/loco.png"> Cocoloco Management System </div>

<br>
    <br><br><br><br>

    <main class=" m-2">

        <div class="container my-4">

            <div class="row">

                <div class="col-sm-4" >
                    <div class="card" style="background-color:darkseagreen">
                        <div class="card-body bg-light rounded" >
                            <h3 class="card-title text-success">Manage Users</h3>
                    
                            <br>
                            <a href="user.php" class="btn btn-outline-success">View</a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="card" style="background-color:darkseagreen">
                        <div class="card-body bg-light rounded">
                            <h3 class="card-title text-success">Reservation</h3>
                            
                            <br>
                            <a href="reservation.php" class="btn btn-outline-success">View</a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="card" style="background-color:darkseagreen">
                        <div class="card-body bg-light rounded">
                            <h3 class="card-title text-success">Event Coordination</h3>
                            
                            <br>
                            <a href="appoinmentadmin.php" class="btn btn-outline-success">View</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
<br><br>
        <?php include("footeradmin.php") ?>

    </main>



</body>

</html>