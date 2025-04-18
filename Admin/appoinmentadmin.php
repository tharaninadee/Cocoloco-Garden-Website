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
    <link href="../Assest/styletable.css" rel="stylesheet">
    
    <title>Appoinment</title>
    <style>
       

       .container {
    width: 80%;
    margin: 20px auto;
}
        .row {
            display: flex;
            justify-content: center; /* Center the columns horizontally */
        }

        .col-md-2 {
            width: 20%; /* Set a fixed width for each column */
            box-sizing: border-box; /* Include padding and border in the total width */
            margin: 0 100px;
        }

        .photo-btn a {
            text-decoration: none;
            color: #fff;
        }
    

        .photo-box {
            position: relative;
        overflow: hidden;
        width: 220px;
        height: 150px;
        border-radius: 20px;
        background-color: #C2DDB5;
        margin-top:50px;
            
        }

      
        .photo-box h2 {
  
            font-size: 35px;
            color: brown;
            text-align: center;
            margin-top: 10px;
        }

        .photo-btn {
        font-size: 15px;
        position: absolute;
        bottom: 10px;
        background: green;
        color: white; /* Set font color to white */
        display: inline-block;
        margin-top: 10px;
        margin-left:50px;
        weight:600px;
        height:30px;
}

    </style>
</head>
<body>

<?php include ("navbonlyadmin.php") ?>
    <?php require("conf.php"); ?>
    <br><br><br>
    <div class="topic"><img class="coco" width="80" height="50" style="margin-right:100px;margin-left:30px;" role="img" src="../Image/loco.png">Customer Booking Event Planning
<button class="btn btn-brown"style="margin-bottom:20px; margin-left:500px;"onclick="goBack('view.php')"><-<-GO BACK</button>
</div>  <br><br>

<div class="container">
        <div class="container mt-5">
            <main>
                <div class="row">
                    <div class="col-md-2">
                        <div class="photo-box">
                            <h2>11.00am - 12.00pm</h2>
                            <button class="photo-btn"><a href="appointment1.php">View Bookings</a></button>
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="photo-box">
                            <h2>3.00pm - 4.00pm</h2>
                            <button class="photo-btn"><a href="appointment2.php">View Bookings</a></button>
                        </div>
                    </div>
                </div>
        </div>
 </div>

<script>
    function goBack(phpPage) {
        // Navigate to the specified PHP page
        window.location.href = phpPage;
    }
</script>           

</body>

</html>